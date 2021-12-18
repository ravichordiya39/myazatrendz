<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product\Category;
use App\Models\Product\ProductBookmark;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;


use App\Http\Libs\ProductLib;
use App\Models\User;
use App\Models\User\ShippingAddress;
use App\Models\UserAddress;
use App\Models\UserCoupon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller{
    public function __construct(){
        $this->middleware('auth');
        ///$this->middleware('user');
    }
    public function getWishlistProduct(Request $r){
        $data['user']=Auth::user();
        $data['layout']=getLayout();
        $data['lists']=ProductBookmark::where(['user_id'=>$data['user']->id,'status'=>1])->get();
        return view('user.product.wishlist',$data);
    }
    public function saveWishlist(Request $r){
        $validate=Validator::make($r->all(),[
            'id'=>'required|integer',
            'status'=>'required|in:0,1'
        ]);
        if($validate->fails()){
            return array('status'=>0,'message'=>$validate->errors()->first());
        }
        if($r->status){
            $msg=AddWishlist;
        }else{
            $msg=RemoveWishlist;
        }
        try {
            $wish=ProductBookmark::updateOrCreate(['product_id'=>$r->id,'user_id'=>Auth::id()],['status'=>$r->status]);
            return array('status'=>1,'message'=>$msg,'data'=>$wish);
        } catch (\Exception $e) {
            $msg=$e->getMessage();
            dd($msg);
            return array('status'=>0,'message'=>ServerError);
        }

    }
    public function getShippingAddress(Request $r){
        $data['user']=Auth::user();
        $data['layout']=getLayout();
        $data['lists']=UserAddress::where(['user_id'=>$data['user']->id,'status'=>1])->get();
        $data['listHome']=UserAddress::where(['user_id'=>$data['user']->id,'status'=>1,'add_type'=>'billing'])->first();
        return view('user.product.address',$data);
    }
    public function saveShippingAddress(Request $r){
       
        $validate=Validator::make($r->all(),[
            'shipping_first_name'=>'required',
            'shipping_last_name'=>'required',
            'shipping_phone'=>'required',
            'shipping_country'=>'required',
            'shipping_state'=>'required',
            'shipping_city'=>'required',
            'shipping_address_1'=>'required',
            'shipping_postcode'=>'required|integer',
        ]);
        if($validate->fails()){
            return back()->with('error',$validate->errors()->first());
        }
       
        if($r->shipping_id){
            $add=UserAddress::find($r->id);
            $msg="Address updated";
        }else{
            $msg="Address inserted";
            $add= new UserAddress();
            $add->user_id=Auth::id();
        }
     //   dd($add);
        $add->name=$r->shipping_first_name.' '.$r->shipping_last_name;
        $add->mobile=$r->shipping_phone;
        $add->country_id=$r->shipping_country;
        $add->address_type=$r->shipping_add_type;
        
        $add->state_id=$r->shipping_state;
        $add->city=$r->shipping_city;
        $add->house=$r->shipping_address_1;
        $add->area=$r->shipping_address_2;
        $add->pincode=$r->shipping_postcode;
     
        try {
            $add->save();
             return back()->with('success',$msg);
        } catch (\Exception $e) {
            $msg=$e->getMessage();
            dd($msg);
            return back()->with('error',$msg);
        }
    }
    public function getOrders(Request $r){
        $data['user']=Auth::user();
        $data['layout']=getLayout();
         $data['lists']=Order::where(['user_id'=>$data['user']->id])->get();
        return view('user.product.order',$data); 
    }
    public function getOrderDetail(Request $r,$oid){
        $data['user']=Auth::user();
        $data['layout']=getLayout();
        $data['single']=Order::where(['user_id'=>$data['user']->id,'order_id'=>$oid])->first();
        $data['lists']=Order::where(['user_id'=>$data['user']->id,'order_id'=>$oid])->get();
        return view('user.product.order-detail',$data);
    }
    public function getConfirmOrder(Request $r,$oid){
        $data['user']=$user=Auth::user();
        $data['layout']=getLayout();
        $data['odetail']=Order::find($oid);
        $data['saddress']=UserAddress::find($data['odetail']->shipping_address_id);
        $data['baddress']=UserAddress::where(['user_id'=>$user->id,'address_type'=>'2'])->first();
        if(!$data['baddress']){
            $data['baddress']=$data['saddress'];
        }
        return view('front.user.product.confirm-order',$data); 
    }
    public function getCoupons(Request $r){
        $data['user']=Auth::user();
        $data['layout']=getLayout();
        $data['lists'] =  UserCoupon::with('coupon')->where('user_id',Auth::id())->get();
        // $data['lists']=ProductBookmark::where(['user_id'=>$data['user']->id,'status'=>1])->get();
        return view('user.product.coupon',$data); 
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDownload(Request $request,$id)
    {
        $file= storage_path(). "/app/pdf/orders/order_"; 
        #$file= url('storage/app/pdf/orders/order_'); 
        $data['user']=$user=Auth::user();
        $single=Order::where(['user_id'=>$data['user']->id,'order_id'=>$id])->first();
        $headers = array(
            'Content-Type: application/pdf',
        );
        $name = $single->order_id.'.pdf';
        # return Response::download($file.$single->order_id, 'filename.pdf', $headers);
         return response()->download($file.$single->order_id.'.pdf',$name, $headers);
    }
}
