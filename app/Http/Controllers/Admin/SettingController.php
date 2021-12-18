<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
       $setting = Setting::find(1);
       return view('admin.setting.edit', compact('setting'));
    }

    public function store(Request $request)
    {
       $set = Setting::find(1);
       $set->company_name = $request->company_name;
       $set->company_email = $request->company_email;
       $set->contact_us_email = $request->contact_us_email;
       $set->country = $request->country;
       $set->city = $request->city;
       $set->state = $request->state;
       $set->zip = $request->zip;
       $set->phone = $request->phone;
       $set->mobile = $request->mobile;
       $set->description = $request->description;
       $set->working_day = $request->working_day;
       $set->address = $request->address;
       $set->whatsapp = $request->whatsapp;
       if($request->has('favicon')){
          $fileName = time().'fav.'.$request->favicon->extension();
          $set->favicon = $fileName;
          $request->favicon->move(public_path('file'), $fileName);
       }

       if($request->has('logo')){
          $fileName = time().'logo.'.$request->logo->extension();
          $set->logo = $fileName;
          $request->logo->move(public_path('file'), $fileName);
       }

       $set->fb_login = $request->has('facebook_login') ? 1 : 0;
       $set->fb_app_id = $request->facebook_app_id;
       $set->fb_secret_id = $request->facebook_secret_id;
       $set->google_login = $request->has('google_login') ? 1 : 0;
       $set->google_app_id = $request->google_app_id;
       $set->google_secret_id = $request->google_secret_id;
       $set->firebase_api = $request->firebase_api;
       $set->whatsapp_no = $request->whatsapp_no;
       $set->fb_link = $request->fb_link;
       $set->twitter_link = $request->twitter_link;
       $set->pinterest_link = $request->pinterest_link;
       $set->instagram_link = $request->instagram_link;
       $set->instagram_profile = $request->instagram_profile;
       $set->whatsapp_link = $request->whatsapp_link;
       $set->google_link = $request->google_link;
       $set->contact_us = $request->contact_us;
       $set->save();

       return redirect()->back()->with('success','Website setting saved successfully');
    }
}
