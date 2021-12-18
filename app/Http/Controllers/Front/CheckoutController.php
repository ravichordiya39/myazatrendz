<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\UserAddress;
use App\Models\UserAppliedCoupon;
use App\Models\Coupon;
use DB,Auth;
use Session;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if( !Auth::user() ){
            $notification = array(
                'message' => 'First need to login!',
                'alert-type' => 'error'
            );
                 
            return redirect('/')->with($notification);
        }
       $coupon = $request->has('coupon') ? $request->get('coupon') : 'no';
       $coupon = $coupon === null ? 0 : $request->get('coupon');
       $coupon_discount = $request->has('coupon_val') ? $request->get('coupon_val') : 'no';
       $coupon_discount = $coupon_discount === null ? 0 : $request->get('coupon_val');
       $carts = Session::has('cart') ? Session::has('cart') : [];
       
       $carts_data = DB::table('add_to_cart')->where('user_id',Auth::id())->get();
       if( empty($carts_data) ){
          $notification = array(
                'message' => 'Cart is empty!',
                'alert-type' => 'error'
            );
                 
            return redirect()->back()->with($notification);
       }

        $total_amount = 0;
        foreach( $carts_data as $single_cart ){
            $total_amount = $total_amount + ( $single_cart->product_quantity * $single_cart->product_price );
        }
        $applied_cart_d = UserAppliedCoupon::where('user_id',Auth::user()->id)->first();
        if( !empty( $applied_cart_d ) ){
            $applied_cart = Coupon::where('id',$applied_cart_d->coupon_id)->first();
            if( $total_amount < $applied_cart->min_cart_amt ){
                $applied_cart_d->delete();
            }
        }else{
            $applied_cart = array();
        }
        
       
       $countries = DB::table('countries')->select('id','name')->get();
       $addresses = [];
       if(Auth::check()){
        $addresses =  DB::table('user_addresses')->where('user_id',Auth::user()->id)->get();
       }
       $states = DB::table('states')->get();

       return view('frontend.checkout', compact('applied_cart','addresses','coupon','coupon_discount','countries','states','carts_data'));
    }

    public function buynow(Request $request)
    {
        $product_id = $request->product_id;
        $size_id = $request->size_id;
        $color_id = $request->color_id;

        $addresses = [];
        $auth = false;
        if(Auth::check()){
            $auth = true;
            $addresses =  DB::table('user_addresses')->where('user_id',Auth::user()->id)->get();
        }
        $coupon = 0;
        $coupon_discount = 0;
        $countries = DB::table('countries')->select('id','name')->get();
        $states = DB::table('states')->get();
        $product = Product::whereHas('productProductVariations',
                    function (Builder $query)  use ($size_id, $color_id) {
                        $query->where('size_id', $size_id)->where('color_id', $color_id);
                    })
                    ->where('id', $product_id)
                   ->first();

        $productVariation = ProductVariation::where('product_id', $product_id)->where('size_id', $size_id)->where('color_id', $color_id)->first();

        return view('store.checkout.buynow', compact('addresses','coupon','coupon_discount','product','productVariation','countries','states'));
    }

    public function save_shipping(Request $r){
       
        $add= new UserAddress();
        $add->name=$r->shipping_first_name.' '.$r->shipping_last_name;
        $add->mobile=$r->shipping_phone;
        $add->country_id=$r->shipping_country;
        $add->address_type=$r->shipping_add_type;
        $add->company_name=$r->shipping_company;
        $add->email=$r->shipping_email;
        
        $add->state_id=$r->shipping_state;
        $add->city=$r->shipping_city;
        $add->house=$r->shipping_address_1;
        $add->area=$r->shipping_address_2;
        $add->pincode=$r->shipping_postcode;
        $add->user_id=Auth::id();
        $add->save();
        $notification = array(
            'message' => 'Shippind address added successfully!',
            'alert-type' => 'success'
        );
     
        return redirect()->back()->with($notification);
    }
}
