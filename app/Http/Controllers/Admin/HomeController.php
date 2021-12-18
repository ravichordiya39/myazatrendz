<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller {
    public function index() {
        \Log::info(auth()->check());
        if(Auth::check()){

           if(Auth::user()->is_admin != 1){
               Auth::logout();
               return redirect('backoffice/login');
           }
           else{
                return  view('dashboard');
            }
        }
        else{
            return  view('dashboard');
        }
    }
}
