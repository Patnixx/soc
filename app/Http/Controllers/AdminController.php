<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function usersIndex(){
        if(Auth::check() && Auth::user()->role=="Admin"){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                $accounts = User::all();
                return view('admin.users.users', compact('user', 'accounts'));
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }
}
