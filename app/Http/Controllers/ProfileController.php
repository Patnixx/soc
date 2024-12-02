<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profileIndex(){
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
}
