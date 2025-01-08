<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function homeIndex(){
        $user = Auth::user();
        $teachers = User::where('role', 'teacher')->get();
        $cars = Car::inRandomOrder()->take(3)->get();
        return view('home.home', compact('user', 'teachers', 'cars'));
    }
}
