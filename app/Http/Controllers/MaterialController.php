<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Models\Syllab;
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
            $syllabs = Syllab::all();
            return view('materials.index', compact('user', 'unread', 'syllabs'));
        }
    }

    public function create_syllab()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            return view('materials.syllab.create-syllab', compact('user', 'unread'));
        }
    }

    public function store_syllab(Request $request)
    {
        

        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $request->validate([
                'title' => 'required'
            ]);

            $route = $this->cleanString($request->title);

            Syllab::create([
                'title' => $request->title,
                'route' => $route,
            ]);

            return redirect()->route('materials');
        }
        return redirect()->back();
    }

    public function lecture_index($syllab)
    {
        $user = Auth::user();
        $section = Syllab::where('title', $syllab)->first();
        $lectures = Material::with('children')->where('syllab_id', $section->id)->get();
        return view('materials.lecture.lecture', compact('section', 'lectures', 'user', 'syllab'));
    }

    public function lecture_view($syllab)
    {
        $user = Auth::user();
        $section = Syllab::where('title', $syllab)->first();
        $lectures = Material::with('children')->where('syllab_id', $section->id)->get();
        return view('materials.lecture.lecture-view', compact('user', 'lectures', 'section', 'syllab'));
    }

    public function lecture_create($syllab)
    {
        $user = Auth::user();
        $section = Syllab::where('title', $syllab)->first();
        return view('materials.lecture.create-main-theme', compact('user', 'section', 'syllab'));
    }

    public function store_lecture(Request $request ,$syllab)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $section = Syllab::where('title', $syllab)->first();
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            Material::create([
                'title' => $request->title,
                'content' => $request->content,
                'syllab_id' => $section->id,
            ]);

            return redirect()->route('lecture.view', $syllab);
        }
    }

    public function sublecture_create($syllab)
    {
        $user = Auth::user();
        $section = Syllab::where('title', $syllab)->first();
        $main_lectures = Material::where('parent_id', null)->get();
        return view('materials.lecture.create-sub-theme', compact('user', 'section', 'syllab', 'main_lectures'));
    }

    public function store_sublecture(Request $request, $syllab)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'parent' => 'required',
            ]);

            Material::create([
                'title' => $request->title,
                'content' => $request->content,
                'parent_id' => $request->parent,
            ]);

            return redirect()->route('lecture.view', $syllab);
        }
    }

    public function edit($syllab, $id)
    {
        $user = Auth::user();
        $all_syllabs = Syllab::all();
        $main_lectures = Material::where('parent_id', null)->get();
        $lecture = Material::where('id', $id)->first();
        return view('materials.lecture.edit', compact('user', 'lecture', 'all_syllabs', 'main_lectures','syllab', 'id'));
    }

    public function update($syllab, $id, Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'parent' => 'nullable',
                'syllab' => 'nullable',
            ]);

            if($request->parent)
            {
                Material::where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'parent_id' => $request->parent,
                ]);
            }
            elseif($request->syllab)
            {
                Material::where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'syllab_id' => $request->syllab,
                ]);
            }

            return redirect()->route('lecture.view', $syllab);
        }
    }

    public function delete($syllab, $id)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            Material::where('id', $id)->delete();
            return redirect()->route('lecture.view', $syllab);
        }
    }
}
