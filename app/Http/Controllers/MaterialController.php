<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use App\Models\Syllab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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
        return redirect()->back();
    }

    public function create_syllab()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            return view('materials.syllab.create-syllab', compact('user', 'unread'));
        }
        return redirect()->back();
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
        $elders = Material::whereNull('elder_id')
                        ->get(['id', 'title'])
                        ->keyBy('id');

        $parents = Material::whereNotNull('elder_id')
                        ->whereNull('parent_id')
                        ->get(['id', 'title', 'elder_id'])
                        ->groupBy('elder_id');

        $children = Material::whereNotNull('parent_id')
                        ->get(['id', 'title', 'parent_id'])
                        ->groupBy('parent_id');

        $lectures = [];
        foreach ($elders as $elderId => $elder) {
            $eldersParents = $parents->get($elderId, []);
            foreach ($eldersParents as $parent) {
                $parent->children = $children->get($parent->id, []);
            }
            $lectures[$elderId] = [
                'elder' => $elder,
                'parents' => $eldersParents
            ];
        }
        return view('materials.lecture.lecture', compact('section', 'lectures', 'user', 'syllab'));
    }

    public function lecture_view($syllab)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $section = Syllab::where('title', $syllab)->first();
            $elders = Material::whereNull('elder_id')
                        ->get(['id', 'title'])
                        ->keyBy('id');

        $parents = Material::whereNotNull('elder_id')
                        ->whereNull('parent_id')
                        ->get(['id', 'title', 'elder_id'])
                        ->groupBy('elder_id');

        $children = Material::whereNotNull('parent_id')
                        ->get(['id', 'title', 'parent_id'])
                        ->groupBy('parent_id');

        $lectures = [];
        foreach ($elders as $elderId => $elder) {
            $eldersParents = $parents->get($elderId, []);
            foreach ($eldersParents as $parent) {
                $parent->children = $children->get($parent->id, []);
            }
            $lectures[$elderId] = [
                'elder' => $elder,
                'parents' => $eldersParents
            ];
        }
            return view('materials.lecture.lecture-view', compact('user', 'lectures', 'section', 'syllab'));
        }
        return redirect()->back();
    }

    public function lecture_create($syllab) //SECTION - ELDER CREATE
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $section = Syllab::where('title', $syllab)->first();
            return view('materials.lecture.create-main-theme', compact('user', 'section', 'syllab'));
        }
        return redirect()->back();
    }

    public function store_lecture(Request $request ,$syllab) //SECTION - ELDER STORE
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
        return redirect()->back();
    }

    public function sublecture_create($syllab)  //SECTION - PARENT CREATE
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $section = Syllab::where('title', $syllab)->first();
            $main_lectures = Material::where('elder_id', null)->get();
            return view('materials.lecture.create-sub-theme', compact('user', 'section', 'syllab', 'main_lectures'));
        }
        return redirect()->back();
    }

    public function store_sublecture(Request $request, $syllab) //SECTION - PARENT STORE
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'elder' => 'required',
            ]);

            Material::create([
                'title' => $request->title,
                'content' => $request->content,
                'elder_id' => $request->elder,
            ]);

            return redirect()->route('lecture.view', $syllab);
        }
        return redirect()->back();
    }

    public function childlecture_create($syllab) //SECTION - CHILD CREATE
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $section = Syllab::where('title', $syllab)->first();
            $sub_lectures = Material::whereNull('parent_id')->whereNull('syllab_id')->get();
            return view('materials.lecture.create-child-theme', compact('user', 'section', 'syllab', 'sub_lectures'));
        }
        return redirect()->back();
    }

    public function childlecture_assign($syllab, Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $section = Syllab::where('title', $syllab)->first();
            $parent = Material::where('id', $request->parent)->first();
            return view('materials.lecture.assign-child-theme', compact('user', 'section', 'syllab', 'parent'));
        }
        return redirect()->back();
    }

    public function store_childlecture($syllab, $parent, Request $request) //SECTION - CHILD STORE
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            Material::create([
                'title' => $request->title,
                'content' => $request->content,
                'parent_id' => $request->parent,
                'elder_id' => $parent,
            ]);

            return redirect()->route('lecture.view', $syllab);
        }
    }


    public function edit($syllab, $id)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $all_syllabs = Syllab::all();
            $main_lectures = Material::where('elder_id', null)->get();
            $sub_lectures = Material::where('parent_id', null)->get();
            $lecture = Material::where('id', $id)->first();
            return view('materials.lecture.edit', compact('user', 'lecture', 'all_syllabs', 'main_lectures', 'sub_lectures' ,'syllab', 'id'));
        }
        return redirect()->back();
    }

    public function update($syllab, $id, Request $request)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
                'elder' => 'nullable',
                'parent' => 'nullable',
                'syllab' => 'nullable',
            ]);

            if($request->elder)
            {
                Material::where('id', $id)->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'elder_id' => $request->elder,
                ]);
            }

            elseif($request->parent)
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
        return redirect()->back();
    }

    public function delete($syllab, $id)
    {
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher')
        {
            Material::where('id', $id)->delete();
            return redirect()->route('lecture.view', $syllab);
        }
        return redirect()->back();
    }
}
