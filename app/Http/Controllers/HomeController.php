<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function homeIndex(){
        $user = Auth::user();
        return view('home.home', compact('user'));
    }
}
