<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            $materials = Material::all();
            return view('materials.index', compact('materials', 'user', 'unread'));
        }
    }
}
