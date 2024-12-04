<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    //
    public function progressIndex(){
        $user = Auth::user();

        if(Auth::user()->role == 'Admin'){
            $courses = Course::all();
            $forms = CourseForm::all();
            return view('course.progress', compact('user', 'courses', 'forms'));
        }
        $id = $user->id;
        //$course = Course::with('users')->get();
        $courses = Course::whereHas('users', function($query) use ($id){
            $query->where('user_id', $id);
        })->get();
        return view('course.progress', compact('user', 'courses'));
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
        CourseForm::create([
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

        Course::create([
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
