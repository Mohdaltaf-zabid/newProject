<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class homeControl extends Controller
{
    function index()
    {
        return view("home");
    }

    function redirectFunct()
    {
        $typeuser=Auth::user()->usertype;

        if($typeuser =='1'){
            return view('admin.adminpage');
        }elseif($typeuser =='2'){
            return view('admin.adminpage');
        }elseif($typeuser =='3'){
            return view('admin.adminpage');
        }else{
            return view('home');
        }
    }
}