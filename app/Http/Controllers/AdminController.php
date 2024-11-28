<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminIndex(){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                return view('admin.admin', compact('user'));
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }
}
