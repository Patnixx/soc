<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function profileIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.index', compact('user', 'unread'));   ;
        }
    }

    public function personalIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.personal.index', compact('user', 'unread'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function personalUpdate(){

    }

    public function passwordIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.password.index', compact('user', 'unread'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function passwordUpdate(){

    }

    public function emailIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.email.index', compact('user', 'unread'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function emailUpdate(){

    }

    public function creditsIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.credits.index', compact('user', 'unread'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
