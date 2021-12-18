<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\AddToCart;
use App\Models\Reviews;
use App\Models\ProductVariation;
use App\Models\Size;
use App\Models\Color;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use DB, Auth;

class ProductController extends Controller
{
    public function index(Product $id) {
        $variations=[];
        $product=$id;
        $sizes=Size::all();
        $colors=Color::all();
        $primaryvariation=$product->productProductVariations()->where('primary_variation',1)->first();
        $images=$product->productProductImages()->where('product_color_id',$primaryvariation->color_id)->get();
        $firstimage=$product->productProductImages()->where('product_color_id',$primaryvariation->color_id)->first();
        return view('front.product',compact('product','sizes','colors','primaryvariation','images','firstimage'));
    }

    public function get_product_image(Request $request){
        $images=ProductImage::where('product_id',$request->productId)->where('product_color_id',$request->colorId)->get();
        return response()->json($images,200);
    }

    public function info($id){
      $product = Product::find($id);


      $info = [];
      $info['id'] = $product->id;
      $info['category'] = $product->category->name;
      $info['sub_category'] = $product->sub_category->name;
      $info['child_category'] = $product->child_category !== null ?? $product->child_category->name ;
      $info['name'] = $product->name;
      $info['desc'] = $product->description;
      $info['detail'] = $product->details;
      $info['slug'] = $product->slug;
      $info['sku'] = $product->sku_code;
      $info['in_stock'] = $product->in_stock;
      $info['is_exclusive'] = $product->is_exclusive;
      $info['is_featured'] = $product->is_featured;
      $info['is_new'] = $product->is_new;
      $info['is_bulk'] = $product->is_bulk;
      $info['view_count'] = $product->view_count;
      $info['discount_type'] = $product->discount_type;
      $info['discount'] = $product->discount;
      $info['tax_rate'] = $product->tax_rate;
      $info['status'] = $product->status;
      $info['description'] = $product->description;
      $info['details'] = $product->details;
      $info['slug'] = $product->slug;
      $info['sku_code'] = $product->slug;
      $info['primary_variation'] = $product->primary_variation;
      $info['images'] = $product->productProductImages;
      $info['variations'] = $product->productProductVariations;
      $info['attributes'] = $product->productProductAttributes;

    //   \Log::info($info);
    //   return view('frontend.partials.product_popup', compact('info'));
      return response()->json([
        'success' => true,
        'code' => 200,
        'html' => view('frontend.partials.product_popup', compact('info'))->render(),
        'message' => 'Product info retrieve successfully.',
        'product' => $info
      ]);
    }

    public function detail($slug)
    {
      $sizes = Size::where('status', '1')->get();
      $colors = Color::where('status', '1')->get();
      $attributes=Attribute::where('status',1)->get();
      $attribute_values=AttributeValue::where('status',1)->get();
      $categories = Category::where('status',1)->get();

      $product = Product::where('slug', $slug)->first();

      $category_str = $product->category->name . '  ' .$product->sub_category->name. '  '.$product->child_category;
      $info = [];
      $info['id'] = $product->id;
      $info['category'] = $product->category->name;
      $info['sub_category'] = $product->sub_category->name;
      $info['child_category'] = $product->child_category ? $product->child_category->name : '' ;
      $info['category_slug'] = $product->category->slug;
      $info['sub_category_slug'] = $product->sub_category->slug;
      $info['child_category_slug'] = $product->child_category ? $product->child_category->slug : '' ;
      $info['name'] = $product->name;
      $info['desc'] = $product->description;
      $info['detail'] = $product->details;
      $info['slug'] = $product->slug;
      $info['sku'] = $product->sku_code;
      $info['in_stock'] = $product->in_stock;
      $info['is_exclusive'] = $product->is_exclusive;
      $info['is_featured'] = $product->is_featured;
      $info['is_new'] = $product->is_new;
      $info['is_bulk'] = $product->is_bulk;
      $info['view_count'] = $product->view_count;
      $info['discount_type'] = $product->discount_type;
      $info['discount'] = $product->discount;
      $info['tax_rate'] = $product->tax_rate;
      $info['status'] = $product->status;
      $info['description'] = $product->description;
      $info['details'] = $product->details;
      $info['slug'] = $product->slug;
      $info['sku_code'] = $product->slug;
      $info['primary_variation'] = $product->primary_variation;
      $info['images'] = $product->productProductImages;
      $info['variations'] = $product->productProductVariations;
      $info['attributes'] = $product->productProductAttributes;


      $products = Product::where('category_id',$product->category_id)->limit(10)->get();
      $trending = [];
      $i = 0;
      $product->view_count = $product->view_count + 1;
      $product->save();
      foreach($products as $pro){
        $i++;
        $trending[$i]['id'] = $pro->id;
        $trending[$i]['category'] = $pro->category->name;
        $trending[$i]['sub_category'] = $pro->sub_category->name;
        $trending[$i]['child_category'] = $pro->child_category !== null ?? $pro->child_category->name ;
        $trending[$i]['name'] = $pro->name;
        $trending[$i]['desc'] = $pro->description;
        $trending[$i]['detail'] = $pro->details;
        $trending[$i]['slug'] = $pro->slug;
        $trending[$i]['sku'] = $pro->sku_code;
        $trending[$i]['in_stock'] = $pro->in_stock;
        $trending[$i]['is_exclusive'] = $pro->is_exclusive;
        $trending[$i]['is_featured'] = $pro->is_featured;
        $trending[$i]['is_new'] = $pro->is_new;
        $trending[$i]['is_bulk'] = $pro->is_bulk;
        $trending[$i]['view_count'] = $pro->view_count;
        $trending[$i]['discount_type'] = $pro->discount_type;
        $trending[$i]['discount'] = $pro->discount;
        $trending[$i]['tax_rate'] = $pro->tax_rate;
        $trending[$i]['status'] = $pro->status;
        $proimages = $pro->productProductImages;
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

        $trending[$i]['images'] =  $proimages;
        $trending[$i]['sizes'] = $sizes;
        $trending[$i]['colors'] = $colors;
        $trending[$i]['single_mrp_price'] =$mrp_price;
        $trending[$i]['single_sales_price'] = $sale_price;
        $trending[$i]['wholesale_mrp_price'] =$wholesale_price;
        $trending[$i]['wholesale_sales_price'] = $wholesale_price;
        $trending[$i]['wholesale_qty'] = $wholesale_qty;

    }

      $reviews = DB::table('product_reviews')->where('product_id',$product->id)->get()->toArray();
      $rating_rev = DB::table('product_reviews')->select(DB::raw('COUNT(*) AS total_reviews'),DB::raw('AVG(rating) as overall_rating'))->where('product_id',$product->id)->get()->toArray();
      if( Auth::user() ){
        $check_user_r = DB::table('product_reviews')->where('user_id',Auth::user()->id)->where('product_id',$product->id)->first();
        if( !empty($check_user_r) ){
          $check_user_c = 1;
        }else{
          $check_user_c = 0;
        }
      }else{
        $check_user_c = 0;
        $check_user_r = array();
      }
      
      // print_r($rating_rev); die;
      return view('frontend.product_detail', compact('check_user_c','check_user_r','reviews','rating_rev','info','sizes','colors','attributes','categories','category_str','attribute_values','trending'));
    }

    public function variations(Request $request){
      // print_r($request->all()); die;
      $product = ProductVariation::where('product_id',$request->product_id)->where('size_id',$request->size_id)->where('color_id',$request->color_id)->first();

      $info = [];

      if( !empty($product) ){
        $info['single_price'] = $product->single_price;
        $info['single_sales_price'] = $product->single_sales_price;
        $info['single_price_quantity'] = $product->single_price_quantity;
        $info['pro_images'] = ProductImage::select(['id','file_name'])->where('product_id',$request->product_id)->where('product_color_id',$request->color_id)->get()->toArray();
      }

      return response()->json([
        'success' => true,
        'code' => 200,
        'data' => $info
      ]);
    }

    public function review(Request $request){
      $add_review = new Reviews();
      $add_review->rating = $request->rating;
      $add_review->content = $request->comment;
      $add_review->name = $request->author;
      $add_review->email = $request->email;
      $add_review->user_id = Auth::user()->id;
      $add_review->product_id = $request->product_id;
      $add_review->save();

      return redirect()->back();
    }

    public function review_update(Request $request){
      $update_review = Reviews::where('id',$request->review_id)->first();
      $update_review->rating = $request->rating;
      $update_review->content = $request->comment;
      $update_review->save();

      return redirect()->back();
    }

    public function single_add_to_cart($id){
      $notification = array(
        'message' => 'Product add to cart successfully!',
        'alert-type' => 'success'
      );
      $product_det = ProductVariation::where('product_id',$id)->where('primary_variation',1)->first();
      if( $product_det ){
        $product_inn_d = ProductImage::where('product_id',$id)->where('product_color_id',$product_det->color_id)->first();
        if( Auth::user() ){

            $check_cart_I = AddToCart::where('user_id',Auth::user()->id)->where('product_id',$id)->where('product_color',$product_det->color_id)->where('product_size',$product_det->size_id)->first();
            if( !empty($check_cart_I) ){
              if( $check_cart_I->product_quantity < $product_det->single_price_quantity ){
                
                $check_cart_I->product_quantity = $check_cart_I->product_quantity + 1;
                $check_cart_I->save();

              }else{
                
                $notification = array(
                  'message' => 'Product quantity limit is full.',
                  'alert-type' => 'error'
                );

              }
            }else{
              $add_to_cart = new AddToCart();
              $add_to_cart->user_id = Auth::user()->id;
              $add_to_cart->product_id = $id;
              $add_to_cart->product_name = $product_det->product->name;
              $add_to_cart->product_quantity = 1;
              $add_to_cart->product_color = $product_det->color_id;
              $add_to_cart->product_size = $product_det->size_id;
              $add_to_cart->product_price = $product_det->single_sales_price;
              $add_to_cart->product_image = $product_inn_d->file_name;
              $add_to_cart->save();
            }

        }else{

          $cart = session()->get('cart', []);
          if( $cart[$id.'-'.$product_det->color_id.'-'.$product_det->size_id]['product_quantity'] < $product_det->single_price_quantity ){
            
            $req_quant = $cart[$id.'-'.$product_det->color_id.'-'.$product_det->size_id]['product_quantity'] + 1;
            $cart[$id.'-'.$product_det->color_id.'-'.$product_det->size_id] = [
                "product_id" => $id,
                "product_name" => $product_det->product->name,
                "product_quantity" => $req_quant,
                "product_color" => $product_det->color_id,
                "product_image" => $product_inn_d->file_name,
                "product_size" => $product_det->size_id,
                "product_price" => $product_det->single_sales_price,
            ];
            session()->put('cart', $cart);
            
          }else{
            
            $notification = array(
              'message' => 'Product quantity limit is full.',
              'alert-type' => 'error'
            );

          }
        }
      }else{
        $notification = array(
          'message' => 'Something wrong, Please try again.',
          'alert-type' => 'error'
        );
      }
      return redirect()->back()->with($notification);
    }

    public function add_to_cart(Request $request)
    { 
      // print_r($request->all()); die;
      $notification = array(
        'message' => 'Product add to cart successfully!',
        'alert-type' => 'success'
      );
      if( Auth::user() ){
        $check_cart_I = AddToCart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('product_color',$request->product_color)->where('product_size',$request->product_size)->first();
        if( !empty($check_cart_I) ){
          $check_cart_I->product_quantity = $request->quantity;
          $check_cart_I->save();
        }else{
          $add_to_cart = new AddToCart();
          $add_to_cart->user_id = Auth::user()->id;
          $add_to_cart->product_id = $request->product_id;
          $add_to_cart->product_name = $request->product_name;
          $add_to_cart->product_quantity = $request->quantity;
          $add_to_cart->product_color = $request->product_color;
          $add_to_cart->product_size = $request->product_size;
          $add_to_cart->product_price = $request->product_price;
          $add_to_cart->product_image = $request->product_image;
          $add_to_cart->save();
        }

      }else{
        $cart = session()->get('cart', []);
        $cart[$request->product_id.'-'.$request->product_color.'-'.$request->product_size] = [
            "product_id" => $request->product_id,
            "product_name" => $request->product_name,
            "product_quantity" => $request->quantity,
            "product_color" => $request->product_color,
            "product_image" => $request->product_image,
            "product_size" => $request->product_size,
            "product_price" => $request->product_price,
        ];
        session()->put('cart', $cart);
      }
      return redirect()->back()->with($notification);
    }

    public function update_cart(Request $request)
    {
      if($request->id && $request->quantity){
          $cart = session()->get('cart');
          $cart[$request->id]["product_quantity"] = $request->quantity;
          session()->put('cart', $cart);
          session()->flash('success', 'Cart updated successfully');
      }
    }

    public function remove_cart(Request $request)
    {
      /*if($request->id) {
          $cart = session()->get('cart');
          if(isset($cart[$request->id])) {
              unset($cart[$request->id]);
              session()->put('cart', $cart);
          }
          session()->flash('success', 'Product removed successfully');
      }
      print_r($request->all()); die;*/
      if( Auth::user() ){
        $check_cart_I = AddToCart::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->where('product_color',$request->product_color)->where('product_size',$request->product_size)->first();
        if( $check_cart_I ){
          $check_cart_I->delete();
        }
      }else{
          $cart = session()->get('cart');
          unset($cart[$request->product_id.'-'.$request->product_color.'-'.$request->product_size]);
          session()->put('cart', $cart);
      }
      $notification = array(
        'message' => 'Remove product from cart successfully!',
        'alert-type' => 'success'
      );
      return redirect()->back()->with($notification);
    }
}
