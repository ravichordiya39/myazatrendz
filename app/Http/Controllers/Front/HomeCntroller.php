<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\FaqQuestion;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\NotAvailabilityPincode;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Setting;
use App\Models\ProductAttribute;
use App\Models\ProductVariation;
use App\Models\UspSection;
use App\Models\Testimonial as Testimonials;
use App\Models\Size;
use DB, Auth;
use Mail;
class HomeCntroller extends Controller
{
    public function index() {
        $i = 0;
        $trending = [];
        $banners = Slider::whereStatus('1')->latest()->get();
        $setting = Setting::latest()->first();

        $testimonials = Testimonials::whereStatus('1')->latest()->get();

        $usps = UspSection::where('status','1')->latest()->get();
        
        $trending = Product::where('is_exclusive',1)
                           ->where('status',1)
                            ->whereNull('deleted_at')
                           ->orderBy('created_at', 'desc')
                           ->limit(20)->get();
        #print_r($trending); die;
        $newarrivals = DB::table('banners_bestsellers')->where('type',1)->limit(3)->get();
        $bestsellers = DB::table('banners_bestsellers')->where('type',0)->limit(3)->get();

        $hotesale = [];
        $hotesale = Product::where('is_featured',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->limit(20)->get();

        $newproductsarr = [];
        $newproductsarr = Product::where('is_new',1)
                           ->where('status',1)
                           ->orderBy('created_at', 'desc')
                           ->limit(20)->get();

        $latest = [];

		$categoriesis_shop_by_look = Category::where('is_shop_by_look',1)->where('status',1)->get();

		$categoriesis_home = Category::where('is_home',1)->where('status',1)->get();

        // return view('front.home',compact('banners','trending','hotesale','latest','newarrivals','bestsellers'));
        // $cart = session()->get('cart');
        //     if(isset($cart[''])) {
        //         session()->forget('cart.'.'');
        //         session()->put('cart', session()->get('cart'));
        //     }
        // \Session::flush();
        // dd(session()->get('cart'));
        // exit();
        return view('frontend.home',compact('usps','setting','testimonials','banners','trending','newproductsarr','hotesale','latest','categoriesis_home','categoriesis_shop_by_look','newarrivals','bestsellers'));
    }
    public function load_featured_section(){
         $products=Product::orderBy('id','DESC')->get();
         $products->load('productProductImages');
        return response()->json($products,200);
    }

    public function load_exclusive_section(){
        $products=Product::orderBy('id','DESC')->get();
        $products->load('productProductImages');
       return response()->json($products,200);
    }

    public function load_bestseller_section(){
    $products=Product::orderBy('id','DESC')->get();
    $products->load('productProductImages');
     return response()->json($products,200);
   }



public function search(Request $request,$slug=null)
{

    $categoryfilter=[];
    $colorfilter=[];
    $sizes=[];
    $sizefilter=[];
    $attributefilter=[];
    if( !empty($slug) ){
      $slug = last(request()->segments());
      $query = $slug;
    }else{
      $query = $request->q;
    }
    
    $conditions = ['status' => 1];

    $query = Category::where('slug',$query)->first();
    $cat_id = @$query->id;
    $query = @$query->id;
	//echo "<pre>"; print_r($query); die;

    if ($request->ajax()) {
      $prods = Product::query();
      $count =  Product::where('status',1)->get()->count();
      $cat = $query != '' ? $query : '';
      $sortby = $request->sortby;
      $categoryby = $request->categoryby;
      $fabricby = $request->fabricby;
      $priceby = $request->priceby;
      $sizeby = $request->sizes;
      $colorby = $request->colors;
      if( !empty($categoryby) ){
        foreach($categoryby as $attribute){
          $categorybyid[] = $attribute['value_id'];
        }
        $prods = $prods->whereIn('category_id',$categorybyid);
      }else{
          if($cat != ''){
              $prods = $prods->where(function($query) use ($cat){
                 $query->orWhere('category_id',$cat);
                 $query->orWhere('sub_category_id',$cat);
                 $query->orWhere('sub_category_child_id',$cat);
              });
          }
      }
      

     // colors
      if($request->has('colors')){
        // foreach($request->colors as $color){
          $prods = $prods->whereHas('productProductVariations', function ($query)  use ($colorby) {
              $query->whereIn('color_id',$colorby);
          });
        // }
      }



      // sizes
      if($request->has('sizes')){
        // foreach($request->sizes as $size){
         
          $prods = $prods->whereHas('productProductVariations', function ($query)  use ($sizeby) {
              $query->whereIn('size_id',$sizeby);
          });
        // }
      }

      // sizes
      if($request->has('attributes')){
	     $requests =  $request->all();
       \Log::info($requests['attributes'][0]);
       $attrid = [];
       $attrvalid = [];
        foreach($requests['attributes'] as $attribute){
    			$attrid[] = $attribute['attr_id'];
    			$attrvalid[] = $attribute['value_id'];
        }
        
        $prods = $prods->whereHas('productProductAttributes', function ($query)  use ($attrid,$attrvalid) {
            $query->whereIn('attribute_id',$attrid)->whereIn('attribute_value_id',$attrvalid);
    		});
      }

      // sorting
      if( !empty($sortby) ){
        if($sortby == 'plth'){
          /* $prods = $prods->with(['productProductVariations' => function ($query) {
              $query->orderBy('single_sales_price','asc');
          }]); */
          $prods = $prods->orderBy('sales_price','asc');
        }
        else if($sortby == 'phtl'){
          /* $prods = $prods->with(['productProductVariations' => function ($query) {
              $query->orderBy('single_sales_price','');
          }]); */
          $prods = $prods->orderBy('sales_price','desc');
        }
        else if($sortby == 'popular'){
            $prods = $prods->orderBy('view_count','desc');
        }
        else if($sortby == 'discount'){
            $prods = $prods->orderBy('discount','desc');
        }
        else{
            $prods = $prods->orderBy('id','desc');
        }
      }

      

      if( !empty($fabricby) ){
        foreach($fabricby as $attribute){
          $fabricbyid[] = $attribute['value_id'];
        }
        // $prods = $prods->whereIn('sub_category_id',$fabricbyid);
        $prods = $prods->whereHas('productProductAttributes', function ($query)  use ($fabricbyid) {
            $query->whereIn('attribute_value_id',$fabricbyid);
        });
      }

      if( !empty($priceby) ){
        foreach($priceby as $attribute){
          $pricebya[] = explode('-',$attribute['value_id']);
        }
        $pricebya = call_user_func_array('array_merge',$pricebya);
        // $prods = $prods->whereIn('sub_category_id',$fabricbyid);
        $prods = $prods->whereHas('productProductVariations', function ($query)  use ($pricebya) {
            $min_price = reset($pricebya);
            $max_price = end($pricebya);
            $query->whereBetween('single_sales_price',[$min_price, $max_price]);
        });
      }
      
        


      //
      // echo $prods->toSql(); die;
      // return response()->json([
      //   'success' => true,
      //   'data' => '',
      //   'count' => 10
      // ]);
      $count = $prods->where('status',1)->count();
      $prods = $prods->where('status',1)
                      ->paginate(5);
      // }

    $i = 0;
    
    $searchproducts = [];
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
          $variations = ProductVariation::where('product_id',$pro->id)->get();
          //$variations = $pro->productProductVariations
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
      //echo '<pre>';print_r($searchproducts); die;
      
      return response()->json([
        'success' => true,
        'data' => view('frontend.product_list',compact('searchproducts','prods'))->render(),
        'count' => $count
      ]);
    }
    
    
    
    $sizes = Size::where('status', '1')->get();
    $colors = Color::where('status', '1')->get();
    $attributes=Attribute::where('status',1)->get();
    $attribute_fabrics=AttributeValue::where('attribute_id',12)->where('status',1)->get();
    if($query != null){
      $mycat = Category::where('id',$query)->first();

      $child = "";
      $subChild = "";
      $subsubChild = "";
      $parent = "";
      $primary = "";
      if($mycat->parent_id != 0){
        $sub= Category::where('id', $mycat->id)->first();
        $parent = $sub->name;
        if($sub){
          if($sub->parent_id != 0){
            $subsub = Category::where('id', $sub->parent_id)->first();
            if($subsub){
              $subChild = $subsub->name;
              if($subsub->parent_id != 0){
                $subsubsub = Category::where('id', $subsub->parent_id)->first();
                if($subsubsub){
                  if($subsubsub->parent_id != 0){
                    $subsubChild = $subsubsub->name;
                  }
                  else{
                      $primary = $subsubsub->name;
                  }
                }
              }
              else{
                $primary = $subsub->name;
              }
            }
          }
          else{
            $primary = $sub->name;
          }
        }
      }
      else{
        $primary = $mycat->name;
      }
      $mycat = $subsubChild. '      '.$subChild. '      '.$child. '      '.$parent;
    }
    else{
      $mycat = null;
    }

     $categories = Category::where('parent_id',0)->where('status',1)->get();
      if( !empty($slug) ){
        $slug = last(request()->segments());
        $query = $slug;
      }else{
        $query = $request->q;
      }
  	 // $query = $request->q;
     $products = Product::select(['id']);
     $cat = $cat_id != '' ? $cat_id : '';
     $products = $products->where(function($query) use ($cat){
                   $query->orWhere('category_id',$cat);
                   $query->orWhere('sub_category_id',$cat);
                   $query->orWhere('sub_category_child_id',$cat);
                });
     $products = $products->where('status',1)->get()->toArray();
     $products = array_column($products, 'id');
     return view('frontend.category', compact('products','attribute_fabrics', 'query','categories','categoryfilter','colors','colorfilter','sizes','sizefilter','attributes','attributefilter','mycat','primary'));
}

public function check_availability(Request $request){
  $check_availability = NotAvailabilityPincode::where('pincode',$request->pin_code)->first();
  if( empty($check_availability) ){
    $code = 301;
    $message = 'Delivery availabe for pincode!';
  }else{
    $code = 302;
    $message = 'Delivery is not availabe for pincode!';
  }
  return response()->json([
    'success' => true,
    'code' => $code,
    'message' => $message
  ]);
}


public function load_products(Request $request){
  if ($request->ajax()) {
            return view('pagiresult',compact('products'));
  }
}

public function about_us(){
  $testimonials = Testimonials::whereStatus('1')->latest()->get();
  return view('frontend.about', compact('testimonials'));
}

public function contact_us( Request $request ){
  $array_data = array();
  
  
  return view('frontend.contact_us', compact('array_data'));
}

public function faq_page(){
  $array_data = FaqQuestion::where('status',1)->get();
  return view('frontend.faq', compact('array_data'));
}

public function contact_us_post( Request $request ){
  if( !empty($request->all()) ){
    $data = array();
    $data['contact_text'] = $request->contact_text;
    $data['contact_subject'] = $request->contact_subject;
    $data['contact_phone'] = $request->contact_phone;
    $data['contact_name'] = $request->contact_name;
    $data['contact_email'] = $request->contact_email;
    Mail::send('mail', $data, function($message) use ($data) {
       $message->to('myazatrendz@gmail.com', 'Contact Us')->subject('Contact Us');
       $message->from($data['contact_email']);
    });
    if (Mail::failures()) {
        return response()->json([
          'success' => false,
        ]);
    }else{
      return response()->json([
        'success' => true,
      ]);
    }
    
  }
}



}
