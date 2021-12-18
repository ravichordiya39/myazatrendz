<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddToCart;

use Auth, Hash ;
use Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        session(['link' => url()->previous()]);
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request,$provider)
    {   
        if( $request->error ){
            $notification = array(
                'message' => 'Something wrong, Please try again later!',
                'alert-type' => 'error'
            );

            return redirect(session('link'))->with($notification);
        }else{
            $userSocial = Socialite::driver($provider)->user();
            $users = User::where(['email' => $userSocial->getEmail()])->first();
            $notification = array(
                'message' => 'Login Successfully!',
                'alert-type' => 'success'
            );

            if($users){
                Auth::login($users);
                if( session('cart') ){
                    foreach (session('cart') as $key => $single_cart) {
                        $check_cart_I = AddToCart::where('user_id',$users->id)->where('product_id',$single_cart['product_id'])->where('product_color',$single_cart['product_color'])->where('product_size',$single_cart['product_size'])->first();
                        if( !empty($check_cart_I) ){
                          $check_cart_I->product_quantity = $single_cart['product_quantity'];
                          $check_cart_I->save();
                        }else{
                          $add_to_cart = new AddToCart();
                          $add_to_cart->user_id = $users->id;
                          $add_to_cart->product_id = $single_cart['product_id'];
                          $add_to_cart->product_name = $single_cart['product_name'];
                          $add_to_cart->product_quantity = $single_cart['product_quantity'];
                          $add_to_cart->product_color = $single_cart['product_color'];
                          $add_to_cart->product_size = $single_cart['product_size'];
                          $add_to_cart->product_price = $single_cart['product_price'];
                          $add_to_cart->product_image = $single_cart['product_image'];
                          $add_to_cart->save();
                        }
                    }
                }
                session()->put('cart', []);
                return redirect(session('link'))->with($notification);
            }else{
                $user = new User();
                $user->name = $userSocial->getName();
                $user->email = $userSocial->getEmail();
                $user->provider_id = $userSocial->getId();
                $user->provider = $provider;
                $user->save();
                Auth::login($user);
                if( session('cart') ){
                    foreach (session('cart') as $key => $single_cart) {
                      $add_to_cart = new AddToCart();
                      $add_to_cart->user_id = $user->id;
                      $add_to_cart->product_id = $single_cart['product_id'];
                      $add_to_cart->product_name = $single_cart['product_name'];
                      $add_to_cart->product_quantity = $single_cart['product_quantity'];
                      $add_to_cart->product_color = $single_cart['product_color'];
                      $add_to_cart->product_size = $single_cart['product_size'];
                      $add_to_cart->product_price = $single_cart['product_price'];
                      $add_to_cart->product_image = $single_cart['product_image'];
                      $add_to_cart->save();
                    }
                }
                session()->put('cart', []);
                return redirect(session('link'))->with($notification);
            }
        }
    }
}
