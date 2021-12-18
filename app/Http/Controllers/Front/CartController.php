<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{
    public function index(){
        $coupons = Coupon::where('valid_to','<=', Carbon::now())->where('status',1)->get();
        $products = Product::orderBy('view_count','desc')->limit(10)->get();
        $carts = \Session::has('cart') ? session()->get('cart') : [];
        return view('frontend.cart', compact('carts','products','coupons'));
    }

    public function apply_coupon(Request $request)
    {
        $coupon = Coupon::where('valid_to','>=', Carbon::now())
                  ->where('status',1)
                  ->where('code',$request->coupon)
                  ->first();
        $discount_price = 0;
        if($coupon){
           if($request->amount > $coupon->min_cart_amount){
               $discount = 0;
               if($coupon->discount_type === 1){
                   $discount = $request->amount  * ($coupon->max_discount / 100);
               }
               else{
                   $discount = $coupon->max_discount;
               }

               return response()->json([
                    'success' => true,
                    'code' => 200,
                    'message' => 'Coupon Apply successfully',
                    'coupon_price' => $discount
                ]);

           }
           else{
                return response()->json([
                    'success' => true,
                    'code' => 403,
                    'message' => 'Order amount should be more then Rs'.$coupon->min_cart_amount,
                ]);
            }

        }
        else{
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Invalid coupon',
            ]);
        }
    }

    public function store(Request $request)
    {
        \Log::info($request->all());
        // $cart = session()->get('cart', []);

        // if(isset($cart[$request->id])) {
        //     $cart[$request->id]['qty']++;
        // } else {
        //     $cart[$request->id] = [
        //         'id' => $request->id,
        //         'name' => $request->name,
        //         'product_id' => $request->product_id,
        //         'color_id' => $request->color_id,
        //         'size_id' => $request->size_id,
        //         'primary_variation' => $request->primary_variation,
        //         'qty' => $request->qty,
        //         'single_price' => $request->single_price,
        //         'single_sales_price' => $request->single_sales_price,
        //         'single_price_quantity' => $request->single_price_quantity,
        //         'wholesale_price' => $request->wholesale_price,
        //         'wholesale_sales_price' => $request->wholesale_sales_price,
        //         'wholesale_price_quantity' => $request->wholesale_price_quantity,
        //         'size_status' => $request->size_status,
        //         'status' => $request->status,
        //         'product_images' => $request->product_images,
        //         'created_at' => Carbon::now()
        //     ];
        // }

        // session()->put('cart', session()->get('cart'));

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Product ass to cart successfully',
            'cart' =>  session()->has('cart') ? session()->get('cart') : [],
            'count' => count(session()->get('cart'))
        ]);

    }


    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->qty;
            session()->put('cart', $cart);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Product quantity updated successfully.',
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Not found.',
            ]);
        }
    }

    public function size_update(Request $request)
    {

        if($request->id && $request->size){
            $product = ProductVariation::where('product_id', $request->product_id)
                              ->where('size_id',$request->size)
                              ->where('color_id', $request->color_id)
                              ->first();


            $cart = session()->get('cart');
            $cart[$request->id]["size_id"] = $request->size;
            $cart[$request->id]["primary_variation"] = $product->primary_variation;
            $cart[$request->id]["mrp_price"] = $product->single_price;
            $cart[$request->id]["single_sales_price"] = $product->single_sales_price;
            $cart[$request->id]["single_price_quantity"] = $product->single_price_quantity;
            $cart[$request->id]["wholesale_price"] = $product->wholesale_price;
            $cart[$request->id]["wholesale_sales_price"] = $product->wholesale_sales_price;
            $cart[$request->id]["wholesale_price_quantity"] = $product->wholesale_price_quantity;
            $cart[$request->id]["size_status"] = $product->size_status;
            $cart[$request->id]["status"] = $product->status;

            session()->put('cart', $cart);
            $data = $this->update_response(1);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Product size updated successfully.',
                'carts' => $data,
                'count' => count(session()->get('cart'))
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Not found.',
            ]);
        }
    }

    public function qty_update(Request $request)
    {
        if($request->id && $request->qty){
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] = $request->qty;
            session()->put('cart', $cart);
            $data = $this->update_response();
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Product quantity updated successfully.',
                'carts' => $data,
                'count' => count(session()->get('cart'))
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Not found.',
            ]);
        }
    }


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                session()->forget('cart.'.$id);
                // unset($cart[$request->id]);
                session()->put('cart', session()->get('cart'));
            }
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Product remove from cart successfully.',
            ]);
        }
        else{
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Not found.',
            ]);
        }
    }


    public function update_response($size = 0){
        $carts = session('cart');
        $rescart = [];
        $temp = [];
        $i = 0;


        foreach($carts as $cart){
            $temp['id'] = $cart['id'];
            $temp['name'] = $cart['name'];
            $temp['product_id'] = $cart['product_id'];
            $temp['color_id'] = $cart['color_id'];
            $temp['size_id'] = $cart['size_id'];
            $temp['primary_variation'] = $cart['primary_variation'];
            $temp['qty'] = $cart['qty'];
            $temp['single_price'] = $cart['single_price'];
            $temp['single_sales_price'] = $cart['single_sales_price'];
            $temp['single_price_quantity'] = $cart['single_price_quantity'];
            $temp['wholesale_price'] = $cart['wholesale_price'];
            $temp['wholesale_sales_price'] = $cart['wholesale_sales_price'];
            $temp['wholesale_price_quantity'] = $cart['wholesale_price_quantity'];
            $temp['size_status'] = $cart['size_status'];
            $temp['status'] = $cart['status'];
            $temp['product_images'] = $cart['product_images'];
            array_push($rescart, $temp);
        }

        return $rescart;
    }
}
