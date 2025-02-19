<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSyllab;
use App\Models\CourseUser;
use App\Models\Material;
use App\Models\Syllab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MaterialController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin')
            {
                $courses = Course::all();
                $syllabs = Syllab::all();
            }
            elseif($user->role == 'Teacher')
            {
                $courses = Course::where('teacher_id', $user->id)->get();
                $syllabs = Syllab::all();
            }
            elseif($user->role == 'Student')
            {
                $courses = CourseUser::whereHas('user', function($q) use ($user){
                    $q->where('user_id', $user->id);
                })->get();
                
                $syllabs = CourseSyllab::with(['course', 'syllab'])->whereHas('course', function($q) use ($courses) {
                    $q->where('course_id', $courses->pluck('course_id'));
                })
                ->get();
            }
            else
            {
                return view('errors.403');
            }
            return view('materials.index', compact('user', 'unread', 'syllabs'));
        }
        return view('errors.403');
    }

    public function syllab_dash()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $syllabs = Syllab::simplePaginate(10);
                return view('materials.syllab.dashboard', compact('user', 'unread', 'syllabs'));
            }
        }
        return view('errors.403');
    }

    public function create_syllab()
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                return view('materials.syllab.create-syllab', compact('user', 'unread'));
            }
            return view('errors.403');
        }   
        return view('errors.403');
    }

    public function store_syllab(Request $request)
    {
        $user = Auth::user();
        if(Auth::check())
        {
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

                return redirect()->route('syllab.dash');
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function edit_syllab($id)
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $syllab = Syllab::where('id', $id)->first();
                return view('materials.syllab.edit-syllab', compact('user', 'unread', 'syllab'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function update_syllab($id, Request $request)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $request->validate([
                    'title' => 'required',
                ]);

                $route = $this->cleanString($request->title);

                Syllab::where('id', $id)->update([
                    'title' => $request->title,
                    'route' => $route,
                ]);

                return redirect()->route('syllab.dash');
            }
            return view('errors.403');
        }
        return view('errors.403');
    }


    public function delete_syllab($id)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                Syllab::where('id', $id)->delete();
                return redirect()->back();
            }
            return view('errors.403');
        }
        return view('errors.403');

    }

    public function lock_syllab($id)
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        $section = Syllab::where('id', $id)->first();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $syllab = CourseSyllab::with(['course', 'syllab'])->where('syllab_id', $id)->get();
                return view('materials.syllab.lock-syllab', compact('user', 'unread', 'syllab', 'section'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function unlock_syllab(Request $request, $id)
    {
        $user = Auth::user();
        if(!(Auth::check()) && ($user->role != 'Admin' || $user->role != 'Teacher'))
        {
            return view('errors.403');
        }
        $validated = $request->validate([
            'courses' => 'nullable|array',
            'courses.*' => 'boolean',
        ]);

        $relations = CourseSyllab::where('syllab_id', $id)->get();

        foreach ($relations as $relation) {
            $relation->is_locked = isset($validated['courses'][$relation->course_id]) ? 1 : 0;
            $relation->save();
        }
        return redirect()->route('syllab.dash')->with('success', __('materials.updated_success'));
    }

    public function assign_syllab($id)
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        $section = Syllab::where('id', $id)->first();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $syllab = CourseSyllab::with(['course', 'syllab'])->where('syllab_id', $id)->get();
                if($user->role == 'Teacher')
                {
                    $courses = Course::with('teacher')->where('teacher_id', $user->id)->whereNotIn('id', $syllab->pluck('course_id'))->get();
                }
                if($user->role == 'Admin')
                {
                    $courses = Course::with('teacher')->whereNotIn('id', $syllab->pluck('course_id'))->get();
                }
                return view('materials.syllab.assign-syllab', compact('user', 'unread', 'syllab', 'section', 'courses', 'id'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function addCourseToSyllab(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                CourseSyllab::create([
                    'course_id' => $request->course_id,
                    'syllab_id' => $id,
                ]);
                return redirect()->route('syllab.lock', $id);
            }
            return view('errors.403');
        }        
        return view('errors.403');
    }
    /* --------------- */

    public function deleteCourseFromSyllab($courseId, $syllabId)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                CourseSyllab::where('course_id', $courseId)->where('syllab_id', $syllabId)->delete();
                return redirect()->route('syllab.dash');
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function lecture_index($syllab)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role != 'User')
            {
                $section = Syllab::where('title', $syllab)->first();
                $elders = Material::whereNull('elder_id')
                                ->where('syllab_id', $section->id)
                                ->get(['id', 'title', 'content'])
                                ->keyBy('id');

                $parents = Material::whereNotNull('elder_id')
                                ->whereNull('parent_id')
                                ->get(['id', 'title', 'elder_id', 'content'])
                                ->groupBy('elder_id');

                $children = Material::whereNotNull('parent_id')
                                ->get(['id', 'title', 'parent_id', 'content', 'img_name'])
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
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function lecture_view($syllab)
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $section = Syllab::where('title', $syllab)->first();
                $syllab_id = $section->id;
                $lectures = Material::where('syllab_id', $syllab_id)->simplePaginate(20);
                return view('materials.lecture.lecture-view', compact('user', 'lectures', 'section', 'syllab', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function lecture_create($syllab) //SECTION - ELDER CREATE
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $section = Syllab::where('title', $syllab)->first();
                return view('materials.lecture.create-main-theme', compact('user', 'section', 'syllab', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function store_lecture(Request $request ,$syllab) //SECTION - ELDER STORE
    {
        $user = Auth::user();
        if(Auth::check())
        {
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
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function sublecture_create($syllab)  //SECTION - PARENT CREATE
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $section = Syllab::where('title', $syllab)->first();
                $main_lectures = Material::where('elder_id', null)->where('parent_id', null)->whereNotNull('syllab_id')->get();
                return view('materials.lecture.create-sub-theme', compact('user', 'section', 'syllab', 'main_lectures', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function store_sublecture(Request $request, $syllab) //SECTION - PARENT STORE
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $section = Syllab::where('title', $syllab)->first();
                $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                    'elder' => 'required',
                ]);

                Material::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'elder_id' => $request->elder,
                    'syllab_id' => $section->id,
                ]);

                return redirect()->route('lecture.view', $syllab);
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function childlecture_create($syllab) //SECTION - CHILD CREATE
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $section = Syllab::where('title', $syllab)->first();
                $sub_lectures = Material::whereNull('parent_id')->whereNotNull('syllab_id')->whereNotNull('elder_id')->get();
                return view('materials.lecture.create-child-theme', compact('user', 'section', 'syllab', 'sub_lectures', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function childlecture_assign($syllab, Request $request)
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $section = Syllab::where('title', $syllab)->first();
                $parent_row = Material::where('id', $request->parent)->first();
                return view('materials.lecture.assign-child-theme', compact('user', 'section', 'syllab', 'parent_row', 'unread'));
            }
            return view('errors.403');
        }
        return redirect()->back();
    }

    public function store_childlecture(Request $request) //SECTION - CHILD STORE
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                    'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                ]);
                

                $parent_row = Material::where('id', $request->subtheme)->first();
                $elder_row = Material::where('id', $parent_row->elder_id)->first();
                $syllab = Syllab::where('id', $elder_row->syllab_id)->first()->route;
                $syllab_id = Syllab::where('id', $elder_row->syllab_id)->first()->id;
                $img_name = $this->titleToImageName($request->title);

                $file = $request->file('file');
                $fileName = $img_name.'.'.$file->extension();
                $filePath = public_path('assets/'.$syllab.'/');
                $file->move(''.$filePath.'', $fileName);

                Material::create([
                    'title' => $request->title,
                    'content' => $request->content,
                    'parent_id' => $request->subtheme,
                    'elder_id' => $parent_row->elder_id,
                    'img_name' => $img_name,
                    'syllab_id' => $syllab_id,
                ]);

                return redirect()->route('lecture.view', $syllab);
            }
            return view('errors.403');
        }
        return redirect()->back();
    }


    public function edit($syllab, $id)
    {
        $user = Auth::user();
        $unread = $this->checkMails();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $all_syllabs = Syllab::all();
                $main_lectures = Material::where('elder_id', null)->where('parent_id', null)->get();
                $sub_lectures = Material::whereNull('parent_id')->whereNotNull('syllab_id')->whereNotNull('elder_id')->get();
                $lecture = Material::where('id', $id)->first();
                return view('materials.lecture.edit', compact('user', 'lecture', 'all_syllabs', 'main_lectures', 'sub_lectures' ,'syllab', 'id', 'unread'));
            }
            return view('errors.403');
        }
        return redirect()->back();
    }

    public function update($syllab, $id, Request $request)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                    'elder' => 'nullable',
                    'parent' => 'nullable',
                    'sylab' => 'nullable',
                    'sub' => 'nullable',
                    'file' => 'nullable',
                ]);
                if($request->sylab)
                {
                    Material::where('id', $id)->update([
                        'title' => $request->title,
                        'content' => $request->content,
                        'syllab_id' => $request->sylab,
                    ]);
                }
                elseif($request->elder)
                {
                    Material::where('id', $id)->update([
                        'title' => $request->title,
                        'content' => $request->content,
                        'elder_id' => $request->elder,
                    ]);
                }
                elseif($request->parent)
                {
                    if($request->file)
                    {
                        $current_row = Material::where('id', $id)->first();
                        $parent_row = Material::where('id', $request->parent)->first();
                        $elder_row = Material::where('id', $parent_row->elder_id)->first();
                        $syllab = Syllab::where('id', $elder_row->syllab_id)->first()->route;
                        $img_name = $this->titleToImageName($request->title);
                        $oldFilePath = public_path('assets/'.$syllab.'/'.$current_row->img_name.'.jpg');
                        if(File::exists($oldFilePath))
                        {
                            File::delete($oldFilePath);
                        }

                        $file = $request->file('file');
                        $fileName = $img_name.'.jpg';
                        $filePath = public_path('assets/'.$syllab.'/');
                        $file->move(''.$filePath.'', $fileName);

                        Material::where('id', $id)->update([
                            'title' => $request->title,
                            'content' => $request->content,
                            'parent_id' => $request->parent,
                            'img_name' => $img_name,
                        ]);  
                    }
                    else
                    {
                        Material::where('id', $id)->update([
                            'title' => $request->title,
                            'content' => $request->content,
                            'parent_id' => $request->parent,
                        ]);
                    }
                }

                return redirect()->route('lecture.view', $syllab);
            }
            return view('errors.403');
        }
        return redirect()->back();
    }

    public function delete($syllab, $id)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Admin' || $user->role == 'Teacher')
            {
                $material = Material::where('id', $id)->first();
                //NOTE - This is a final child
                if($material->syllab_id != null && $material->elder_id != null && $material->parent_id != null)
                {
                    $imgName = $material->img_name;
                    $extensions = ['jpg', 'jpeg', 'png'];
                    $imgPath = '';
                    foreach ($extensions as $ext) {
                        if (file_exists(public_path('assets/'.$syllab . '/' . $imgName . '.' . $ext))) {
                            $imgPath = public_path('assets/'. $syllab . '/' . $imgName . '.' . $ext);
                            File::delete($imgPath);
                        }
                    }
                    Material::where('id', $id)->delete();
                    return redirect()->route('lecture.view', $syllab);
                }

                //NOTE - This is a parent
                if($material->syllab_id != null && $material->elder_id != null && $material->parent_id == null)
                {
                    $children = Material::where('parent_id', $id)->get();
                    foreach ($children as $child) {
                        $imgName = $child->img_name;
                        $extensions = ['jpg', 'jpeg', 'png'];
                        $imgPath = '';
                        foreach ($extensions as $ext) {
                            if (file_exists(public_path('assets/'.$syllab . '/' . $imgName . '.' . $ext))) {
                                $imgPath = public_path('assets/'. $syllab . '/' . $imgName . '.' . $ext);
                                File::delete($imgPath);
                                Material::where('id', $child->id)->delete();
                            }
                        }
                    }
                    Material::where('id', $id)->delete();
                    return redirect()->route('lecture.view', $syllab);
                }

                //NOTE - This is a main theme
                if($material->syllab_id != null && $material->elder_id == null && $material->parent_id == null)
                {
                    $children = Material::where('elder_id', $id)->get();
                    foreach ($children as $child) {
                        if($child->img_name)
                        {
                            $imgName = $child->img_name;
                            $extensions = ['jpg', 'jpeg', 'png'];
                            $imgPath = '';
                            foreach ($extensions as $ext) {
                                if (file_exists(public_path('assets/'.$syllab . '/' . $imgName . '.' . $ext))) {
                                    $imgPath = public_path('assets/'. $syllab . '/' . $imgName . '.' . $ext);
                                    File::delete($imgPath);
                                    Material::where('id', $child->id)->delete();
                                }
                            }
                        }
                        Material::where('id', $child->id)->delete();
                    }
                    Material::where('id', $id)->delete();
                    return redirect()->route('lecture.view', $syllab);
                }
            }
            return view('errors.403');
        }
        return redirect()->back();
    }
}
