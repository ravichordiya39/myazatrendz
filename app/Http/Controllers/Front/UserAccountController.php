<?php



namespace App\Http\Controllers\Front;



use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\UserAppliedCoupon;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AddToCart;
use App\Models\PasswordReset;
use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;

use DB, Auth;

class UserAccountController extends Controller

{

    public function index(){
        return view('front.user-account');
    }

    public function my_wishlist(){
        if(  !Auth::user() ){
            $notification = array(
                'message' => 'Need to login first!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        $prods = Product::select('products.*')->leftJoin('user_wishlist','user_wishlist.product_id','=','products.id')->where('user_wishlist.user_id',Auth::user()->id)->get();
        $searchproducts = array();
        $i = 0;
        foreach($prods as $pro){
          $i++;
          $searchproducts[$i]['id'] = $pro->id;
          $searchproducts[$i]['category'] = $pro->category->name;
          $searchproducts[$i]['sub_category'] = $pro->sub_category->name;
          $searchproducts[$i]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
          $searchproducts[$i]['name'] = $pro->name;
          $searchproducts[$i]['desc'] = $pro->description;
          $searchproducts[$i]['detail'] = $pro->details;
          $searchproducts[$i]['slug'] = $pro->slug;
          $searchproducts[$i]['sku'] = $pro->sku_code;
          $searchproducts[$i]['in_stock'] = $pro->in_stock;
          $searchproducts[$i]['is_exclusive'] = $pro->is_exclusive;
          $searchproducts[$i]['is_featured'] = $pro->is_featured;
          $searchproducts[$i]['is_new'] = $pro->is_new;
          $searchproducts[$i]['is_bulk'] = $pro->is_bulk;
          $searchproducts[$i]['view_count'] = $pro->view_count;
          $searchproducts[$i]['discount_type'] = $pro->discount_type;
          $searchproducts[$i]['discount'] = $pro->discount;
          $searchproducts[$i]['tax_rate'] = $pro->tax_rate;
          $searchproducts[$i]['status'] = $pro->status;

          $proimages = $pro->productProductImages;
          //$variations = ProductVariation::where('product_id',$pro->id)->get();
          $variations = $pro->productProductVariations;
          $images = [];
          $sizes = [];
          $colors = [];
          // $tax_rate = "";
          $mrp_price = "";
          $sale_price = "";
          $wholesale_price = "";
          $wholesale_price = "";
          $wholesale_qty = "";


          foreach($variations as $var){
             if($var->primary_variation === 1){
                 $size = Size::where('id',$var->size_id)->first();
                 if(isset($size->name)){array_push($sizes,$size);}

                 $color = Color::where('id',$var->color_id)->first()->name;
                 array_push($colors,$color);
                 $mrp_price = $var->single_price;
                 $sale_price = $var->single_sales_price;
                 $wholesale_price = $var->wholesale_price;
                 $wholesale_price = $var->wholesale_sales_price;
                 $wholesale_qty = $var->wholesale_price_quantity;
             }
          }

          if( $mrp_price == '' && $sale_price == '' ){
            $mrp_price = $pro->mrp_price;
            $sale_price = $pro->sales_price;
          }

          $searchproducts[$i]['images'] =  $proimages;
          $searchproducts[$i]['sizes'] = $sizes;
          $searchproducts[$i]['colors'] = $colors;
          $searchproducts[$i]['single_mrp_price'] =$mrp_price;
          $searchproducts[$i]['single_sales_price'] = $sale_price;
          $searchproducts[$i]['wholesale_mrp_price'] =$wholesale_price;
          $searchproducts[$i]['wholesale_sales_price'] = $wholesale_price;
          $searchproducts[$i]['wholesale_qty'] = $wholesale_qty;
      }
      return view('frontend.product_wishlist', compact('searchproducts'));
    }

    public function add_wishlist($id){
        if(  !Auth::user() ){
            $notification = array(
                'message' => 'Need to login first!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        $wishlist = new Wishlist();
        $wishlist->product_id = $id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();
        $notification = array(
            'message' => 'Product add to wishlist successfully!',
            'alert-type' => 'success'
          );
        return redirect()->back()->with($notification);
    }

    public function remove_wishlist($id){
        if(  !Auth::user() ){
            $notification = array(
                'message' => 'Need to login first!',
                'alert-type' => 'error'
              );
            return redirect()->back()->with($notification);
        }
        $wishlist = Wishlist::where('product_id',$id)->where('user_id',Auth::user()->id)->first();
        $wishlist->delete();
        $notification = array(
            'message' => 'Remove product from wishlist successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function cart_page(){
        if( Auth::user() ){
            $cart_data = \App\Models\AddToCart::where('user_id',Auth::user()->id)->get()->toArray();
            $total_amount = 0;
            foreach( $cart_data as $single_cart ){
                $total_amount = $total_amount + ( $single_cart['product_quantity'] * $single_cart['product_price'] );
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
        }else{
            if( session('cart') ){
              $cart_data = session('cart');
            }else{
              $cart_data = array();
            }
            $applied_cart = array();
        }
        return view('frontend.cart_page', compact('cart_data','applied_cart'));
    }

    public function update_cart_page(Request $request){
        //print_r($request->quantity); die;
        $notification = array(
            'message' => 'Update cart successfully!',
            'alert-type' => 'success'
        );
        $product_quantity_arr = $request->quantity;
        $product_color_arr = $request->product_color;
        $product_size_arr = $request->product_size;
        foreach( $request->product_id as $key_data => $single_data_p ){

            if( Auth::user() ){
                $check_cart_I = AddToCart::where('user_id',Auth::user()->id)->where('product_id',$single_data_p)->where('product_color',$product_color_arr[$key_data])->where('product_size',$product_size_arr[$key_data])->first();
                $check_cart_I->product_quantity = $product_quantity_arr[$key_data];
                $check_cart_I->save();

            }else{
                $cart = session()->get('cart', []);
                $cart[$single_data_p.'-'.$product_color_arr[$key_data].'-'.$product_size_arr[$key_data]] = [
                    "product_quantity" => $product_quantity_arr[$key_data],
                ];
                session()->put('cart', $cart);
            }
        }
        return redirect()->back()->with($notification);
    }

    public function apply_coupon(Request $request){
        if( Auth::user() ){

            $coupon_code = $request->coupon_code;
            $ck_coupon = Coupon::where('coupon_type',0)->where('code',$coupon_code)->where('customer_id',Auth::user()->id)->first();
            if( !empty($ck_coupon) ){
                $dt = Carbon::now();
                $check_coupon = Coupon::where('coupon_type',0)->whereRaw('"'.$dt.'" between `valid_from` and `valid_to`')->where('code',$coupon_code)->where('customer_id',Auth::user()->id)->first();
                if( !empty($check_coupon) ){
                    $data_arr = array();
                    $data_arr['coupon'] = $check_coupon->coupon_name.' Appiled';
                    $data_arr['min_cart_amt'] = $check_coupon->min_cart_amt;
                    $data_arr['coupon_id'] = $check_coupon->id;
                    $data_arr['discount_type'] = $check_coupon->discount_type;
                    $data_arr['value'] = $check_coupon->value;
                    $data_arr['max_discount'] = $check_coupon->max_discount;
                    
                    if( $check_coupon->discount_type == 1 ){
                        $set_discount_price = $request->sub_total - $check_coupon->value;
                    }else{
                        $set_dis = ($check_coupon->value / 100) * $request->sub_total;

                        if( $set_dis >= $check_coupon->max_discount ){
                            $set_discount_price = $check_coupon->max_discount;
                        }else{
                            $set_discount_price = $set_dis;
                        }
                    }
                    $data_arr['set_discount_price'] = $set_discount_price;
                    $data_arr['set_total_amount'] = $request->sub_total - $set_discount_price;

                    if( $check_coupon->is_unlimited == 1 ){
                        if( $request->sub_total >= $check_coupon->min_cart_amt ){
                            $new_coupon = new UserAppliedCoupon();
                            $new_coupon->coupon_id = $check_coupon->id;
                            $new_coupon->user_id = Auth::user()->id;
                            $new_coupon->save();

                            return response()->json([
                                'success' => true,
                                'data' => $data_arr,
                                'message' => 'Coupon code is appiled successfully.'
                            ]);
                        }else{
                            return response()->json([
                                'success' => false,
                                'data' => array(),
                                'message' => '₹'.$check_coupon->min_cart_amt.' is a minimum total amount for applying this coupon.'
                            ]);
                        }
                    }else{
                        if( !empty($check_coupon->avlb_coupons) ){
                            if( $request->sub_total >= $check_coupon->min_cart_amt ){
                                $new_coupon = new UserAppliedCoupon();
                                $new_coupon->coupon_id = $check_coupon->id;
                                $new_coupon->user_id = Auth::user()->id;
                                $new_coupon->save();
                                return response()->json([
                                    'success' => true,
                                    'data' => $data_arr,
                                    'message' => 'Coupon code is appiled successfully.'
                                ]);
                            }else{
                                return response()->json([
                                    'success' => false,
                                    'data' => array(),
                                    'message' => '₹'.$check_coupon->min_cart_amt.' is a minimum total amount for applying this coupon.'
                                ]);
                            }
                        }else{
                            return response()->json([
                                'success' => false,
                                'data' => array(),
                                'message' => 'Coupon maximum limit exceed.'
                            ]);
                        }
                    }
                }else{
                    return response()->json([
                        'success' => false,
                        'data' => array(),
                        'message' => 'Coupon code is expired!'
                    ]);
                }
            }else{
                return response()->json([
                    'success' => false,
                    'data' => array(),
                    'message' => 'Coupon code is not valid!'
                ]); 
            }

        }else{
            return response()->json([
                'success' => false,
                'data' => array(),
                'message' => 'Need to be login first!'
            ]);
        }
    }

    public function remove_coupon(Request $request){
        $remove_coupon = UserAppliedCoupon::where('user_id',Auth::user()->id)->where('coupon_id',$request->coupon_id)->first();
        $remove_coupon->delete();
        return response()->json([
            'success' => false,
            'data' => array(),
        ]);
    }

    public function sign_up_page(){
        if( Auth::user() ){
            return redirect('/');
        }
        $countries = DB::table('countries')->select('id','name')->get();
        return view('frontend.sign_up',compact('countries'));
    }

    public function sign_in_page(){
        if( Auth::user() ){
            return redirect('/');
        }
        return view('frontend.sign_in');
    }

    public function sign_in_post(Request $request){
        $email = $request->email;
        $password = $request->password;
        $check_user = User::where('email',$email)->where('provider','web')->first();
        if( !empty( $check_user ) ){
            if (Hash::check($password, $check_user->password))
            {
                $notification = array(
                    'message' => 'Login Successfully!',
                    'alert-type' => 'success'
                );
                Auth::login($check_user);

                if( session('cart') ){
                    foreach (session('cart') as $key => $single_cart) {
                        $check_cart_I = AddToCart::where('user_id',$check_user->id)->where('product_id',$single_cart['product_id'])->where('product_color',$single_cart['product_color'])->where('product_size',$single_cart['product_size'])->first();
                        if( !empty($check_cart_I) ){
                          $check_cart_I->product_quantity = $single_cart['product_quantity'];
                          $check_cart_I->save();
                        }else{
                          $add_to_cart = new AddToCart();
                          $add_to_cart->user_id = $check_user->id;
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

                return redirect('/')->with($notification);
            }else{
                $notification = array(
                    'message' => 'You entered wrong password!',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification); 
            }
        }else{
            $notification = array(
                'message' => 'Please enter valid email!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification); 
        }
    }

    public function sign_up_post(Request $request){
        $check_user = User::where('email',$request->email)->where('provider','web')->first();
        if( empty( $check_user ) ){
            $new_user = new User();
            $new_user->name = $request->first_name.' '.$request->last_name;
            $new_user->email = $request->email;
            $new_user->mobile = $request->phone_number;
            $new_user->password = Hash::make($request->password);
            $new_user->provider = 'web';
            $new_user->save();

            if( !empty($request->country) ){
                $add= new UserAddress();
                $add->name = $request->first_name.' '.$request->last_name;
                $add->mobile = $request->phone_number;
                $add->country_id = $request->country;
                $add->address_type = 1;
                $add->email = $request->email;         
                $add->state_id = $request->state;
                $add->city = $request->city;
                $add->house = $request->address;
                $add->area = $request->address2;
                $add->pincode = $request->postol_code;
                $add->user_id = $new_user->id;
                $add->save();
            }

            $data['email'] = $request->email;
            $data['phone_number'] = $request->phone_number;
            $data['name'] = $request->first_name.' '.$request->last_name;
            Mail::send('registered', $data, function($message) use ($data) {
               $message->to('myazatrendz@gmail.com')->subject('New User');
               $message->from($data['email']);
            });
            $notification = array(
                'message' => 'Registration Successfully, Please login with your email and password!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Email registered already, Please try with another email!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function forget_pass_page(){
        if( Auth::user() ){
            return redirect('/');
        }
        return view('frontend.forget_password');
    }

    public function forget_pass_post(Request $request){
        $email = $request->email;
        $check_email = PasswordReset::where('email',$email)->first();
        if( !empty($check_email) ){
            $check_email->delete();
        }
        $token = Str::random(64);

        $new_reset = new PasswordReset();
        $new_reset->email = $email;
        $new_reset->token = $token;
        $new_reset->expired_at = Carbon::now()->addMinute(10);
        $new_reset->save();

        $data['email'] = $email;
        $data['set_url'] = url('reset-password').'/'.$token;
        Mail::send('forget_password', $data, function($message) use ($data) {
           $message->to($data['email'])->subject('Reset Password');
           $message->from('myazatrendz@gmail.com');
        });

        $notification = array(
            'message' => 'We have e-mailed your password reset link!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function reset_password($token){
        if( Auth::user() ){
            return redirect('/');
        }
        $check_token = PasswordReset::where('token',$token)->first();
        if( empty($check_token) ){
            $notification = array(
                'message' => 'Reset password link is not valid!',
                'alert-type' => 'error'
            );
            return redirect('/')->with($notification);
        }else{
            $current_time = Carbon::now();
            if( $current_time > $check_token->expired_at ){
                $check_token->delete();
                $notification = array(
                    'message' => 'Reset password link is expired!',
                    'alert-type' => 'error'
                );
                return redirect('/')->with($notification);
            }else{
                $user_detail = User::where('email',$check_token->email)->first();
                return view('frontend.reset_password',compact('user_detail'));
            }
        }
    }

    public function reset_password_post(Request $request){
        $user_id = $request->user_id;
        $get_user = User::where('id',$user_id)->first();
        $get_user->password = Hash::make($request->password);
        $get_user->save();
        $notification = array(
            'message' => 'Your password has been changed!',
            'alert-type' => 'success'
        );
        PasswordReset::where('email',$get_user->email)->first()->delete();
        return redirect('/')->with($notification);
    }

}

