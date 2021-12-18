<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth, Hash ;

class AuthController extends Controller
{
    public function login(){
       Auth::logout();
        return view('front.auth.login');
    }

    public function logged_in(Request $request){
      if(auth()->attempt(array('email' => $request->email ,'password' => $request->password))){
          return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'You are logged in'
          ]);
      }
      else if(auth()->attempt(array('mobile' => $request->email, 'password' => $request->password))){
        return response()->json([
          'success' => true,
          'code' => 200,
          'message' => 'You are logged in'
        ]);
      }
      else{
  
        return response()->json([
          'success' => false,
          'code' => 400,
          'message' => 'Please again your credentials and try.'
        ]);
      }

    }

    public function register(){
          return view('front.auth.register');
    }

    public function registered(Request $request){
      $data = $request->all();
      $check = $this->create($data);

      if(auth()->attempt(array('email' => $request->email ,'password' => $request->password))){
        return response()->json([
          'success' => true,
          'message' => 'Register successfully',
          'code' => 200
        ]);
      }
      else{
        return response()->json([
          'success' => true,
          'message' => 'Register successfully',
          'code' => 200
        ]);
      }
    }


    public function create(array $data)
   {
     return User::create([
       'name' => $data['name'],
       'email' => $data['email'],
       'password' => Hash::make($data['password']),
       'mobile' => $data['mobile'],
       'city_id' => $data['city']
     ]);
   }

    public function logout(){
      Auth::logout();
     return redirect('/');
    }


    public function sendotp(Request $request)
    {
      $mobile = $request->mobile;
      $user = User::where('mobile', $mobile)->orWhere('email', $mobile)->first();
      if($user){
        return response()->json([
          'success' => false,
          'code' =>  220,
          'message' => 'Unique mobile number/email is required! this email or mobile which is already exists in out records.',
        ]);
      }
      $client = new \GuzzleHttp\Client();
      $key = env('SMS_AUTH_KEY');
      $otp = generateNumericOTP(6);
      $message = 'Your VASVI verification OTP - ' . $otp;
      $response = $client->request('GET', "http://www.dakshinfosoft.com/api/sendhttp.php?authkey=$key&mobiles=$mobile&message=$message&sender=VASVII&route=4&country=91");



      if($response->getBody()){
        return response()->json([
          'success' => true,
          'code' =>  200,
          'otp' => $otp,
          'mobile' =>  $mobile,
          'message' => 'Otp send it to user successfully.'
        ]);
      }
    }
}
