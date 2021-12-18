<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite, Auth;
use App\Models\User;


class SocialController extends Controller
{
  public function redirect($provider)
    {
       try{
           return Socialite::driver($provider)->redirect();
       }
      catch(\Exception $e){
         \Log::info($e);
      }
    }

    public function callback($provider)
    {
      try {

          $user = Socialite::driver($provider)->user();
          $isUser = User::where('email', $user->email)->first();

          if($isUser){
              Auth::login($isUser);
              return redirect('/');
          }else{
              $createUser = User::create([
                  'name' => $user->name,
                  'email' => $user->email,
                  'provider_id' => $user->id,
                  'provider' => $provider,
                  'password' => encrypt('admin@123')
              ]);

              Auth::login($createUser);
              return redirect('/');
          }

      } catch (Exception $exception) {
          dd($exception->getMessage());
      }

        // $getInfo = Socialite::driver($provider)->user();
        // if($getInfo){
        //   $user = User::where('provider_id', $getInfo->id)->first();
        //
        //   if(!$user){
        //     $user = User::create([
        //       'name' => $getInfo->name,
        //       'email' => $getInfo->email,
        //       'provider' => $provider,
        //       'provider_id' => $getInfo->id
        //     ]);
        //
        //     Auth::login($user);
        //   }
        //   Auth::login($getInfo);
        // }
    }

}
