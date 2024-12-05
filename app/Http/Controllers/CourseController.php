<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;

class CourseController extends Controller
{
    //
    public function progressIndex(){
        $user = Auth::user();

        if(Auth::user()->role == 'Admin'){
            $courses = Course::all();
            $forms = Form::all();
            return view('course.progress', compact('user', 'courses', 'forms'));
        }

        if(Auth::user()->role == 'Teacher'){
            $courses = Course::where('teacher_id', $user->id)->get();
            $forms = Form::all();
            return view('course.progress', compact('user', 'courses', 'forms'));
        }
        
        if(Auth::user()->role == 'Student'){
            $forms = Form::where('user_id', $user->id)->get();
            $courses = CourseUser::with(['course', 'user'])->where('user_id', $user->id)->get();
            /*$kurz_id = CourseUser::where('user_id', $user->id)->get();
            $courses = Course::where('id', $kurz_id->course_id)->get();*/
            return view('course.progress', compact('user', 'courses', 'forms'));
        }
        if(Auth::user()->role == 'User'){
            return redirect('/');
        }
    }

    public function courseForm(){
        $user = Auth::user();
        return view('course.form', compact('user'));
    }

    public function sendForm(Request $request){
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'birthday' => 'required',
            'season' => 'required',
            'length' => 'required',
            'class' => 'required',
            'reason' => 'required'
        ]);

        $id = Auth::id();
        Form::create([
            'user_id' => $id,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'season' => $request->season,
            'length' => $request->length,
            'class' => $request->class,
            'reason' => $request->reason,
        ]);

        return redirect()->route('progress');
    }

    public function courseCreate(){
        $user = Auth::user();
        return view('course.course', compact('user'));
    }

    public function sendCreate(Request $request){
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'season' => 'required',
            'length' => 'required',
            'class' => 'required',
        ]);

        if(Auth::user()->role == 'Teacher'){
            $id = Auth::id();
        } else {
            $id = null;
        }
        Course::create([
            'teacher_id' => $id,
            'name' => $request->name,
            'description' => $request->desc,
            'season' => $request->season,
            'length' => $request->length,
            'class' => $request->class,
            'status' => 'Open',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('progress');

    }
}
