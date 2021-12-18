<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function index(){
        return view('front.user-account');
    }
}
