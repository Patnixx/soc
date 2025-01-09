<?php

namespace App\Http\Controllers;

use App\Models\Occasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OccasionController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        if($user->role != 'User')
        {
            $events = Occasion::simplePaginate(10);
            return view('occasion.index', compact('user', 'events'));
        }
        return redirect()->back();
    }
}
