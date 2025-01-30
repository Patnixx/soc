<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function homeIndex(){
        $cars = Car::with('images')->inRandomOrder()->take(3)->get();
        if(Auth::check())
        {
            $user = Auth::user();
            $unread = $this->checkMails(); 
            return view('home.home', compact('user', 'cars', 'unread'));
        }
        return view('home.home', compact('cars'));
    }
}
