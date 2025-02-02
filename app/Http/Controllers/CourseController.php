<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;
use App\Models\User;

class CourseController extends Controller
{
    //
    public function progressIndex(){
        $user = Auth::user();

        if(Auth::user()->role == 'Admin'){
            $courses = Course::with('teacher')->get();
            $forms = Form::all();
            return view('course.progress', compact('user', 'courses', 'forms'));
        }

        if(Auth::user()->role == 'Teacher'){
            $courses = Course::with('teacher')->where('teacher_id', $user->id)->get();
            $forms = Form::all();
            $unread = $this->checkMails();
            return view('course.progress', compact('user', 'courses', 'forms', 'unread'));
        }
        
        if(Auth::user()->role == 'Student'){
            $forms = Form::where('user_id', $user->id)->get();
            $courses = CourseUser::with(['course', 'user'])->where('user_id', $user->id)->get();
            $unread = $this->checkMails();
            return view('course.progress', compact('user', 'courses', 'forms', 'unread'));
        }
        return redirect()->back();
    }

    public function courseForm(){
        $user = Auth::user();
        $unread = $this->checkMails();
        $user_wo_form = User::where('role', 'Student')->orWhere('role', 'User')->get();
        return view('course.forms.form', compact('user', 'unread', 'user_wo_form'));
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
            'reason' => 'required',
            'user' => 'required',
        ]);

        $email = User::where('id', $request->user)->first()->email;

        $id = Auth::id();
        Form::create([
            'user_id' => $request->user,
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $email,
            'birthday' => $request->birthday,
            'season' => $request->season,
            'length' => $request->length,
            'class' => $request->class,
            'reason' => $request->reason,
        ]);

        return redirect()->route('progress');
    }

    public function detailForm($id){
        $user = Auth::user();
        $form = Form::where('id',$id)->first();
        $unread = $this->checkMails();
        return view('course.forms.detail', compact('user', 'form', 'unread'));
    }

    public function editForm($id){
        $user = Auth::user();
        $form = Form::where('id',$id)->first();
        $unread = $this->checkMails();
        return view('course.forms.edit', compact('user', 'form', 'unread'));
    }

    public function updateForm(Request $request, $id)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required',
            'birthday' => 'required',
            'season' => 'required',
            'length' => 'required',
            'class' => 'required',
            'reason' => 'required',
            'approval' => 'required',
        ]);

        Form::where('id', $id)->update([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'season' => $request->season,
            'length' => $request->length,
            'class' => $request->class,
            'reason' => $request->reason,
            'approval' => $request->approval,
        ]);

        return redirect()->route('progress');
    }

    public function deleteForm($id){
        Form::where('id',$id)->delete();
        return redirect()->route('progress');
    }

    /* -------------------------------------------- */

    public function courseCreate(){
        $user = Auth::user();
        $teachers = User::where('role', 'teacher')->get();
        $unread = $this->checkMails();
        return view('course.courses.course', compact('user', 'teachers', 'unread'));
    }

    public function sendCreate(Request $request){
        $request->validate([
            'name' => 'required',
            'teacher' => 'required',
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
            'teacher_id' => $request->teacher,
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

    public function assignCourse($id){
        $user = Auth::user();
        if(Auth::user()->role == 'Teacher' || Auth::user()->role == 'Admin'){
            $course = Course::with('teacher')->where('id',$id)->first();
            $forms = Form::where('approval', "Waiting")
            ->where('season', $course->season)
            ->where('length', $course->length)
            ->where('class', $course->class)
            ->simplePaginate(3);
            $students = CourseUser::with(['course', 'user'])->where('course_id', $id)->count();
            $unread = $this->checkMails();
            return view('course.courses.assign', compact('user', 'course', 'students', 'forms', 'unread'));
        } 
        else {
            return redirect()->route('progress');
        }
    }

    public function userAssign($id, $courseid){
        CourseUser::create([
            'user_id' => $id,
            'course_id' => $courseid,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Form::where('user_id', $id)->update([
            'approval' => 'Approved',
        ]);

        return redirect('/progress');
    }

    public function unassignCourse($courseId){
        $user = Auth::user();
        $unread = $this->checkMails();
        if($user->role == 'Admin' || $user->role == 'Teacher') {
            $courseUsers = CourseUser::where('course_id', $courseId)->get();
            return view('course.courses.unassign', compact('user', 'unread', 'courseUsers'));
        }
        return redirect()->back();
    }

    public function removeUserFromCourse($courseId, $userId){
        $user = Auth::user();
        if($user->role == 'Admin' || $user->role == 'Teacher') {
            CourseUser::where('course_id', $courseId)->where('user_id', $userId)->delete();
            return redirect()->route('progress');
        }
        return redirect()->back();
    }
    

    public function detailCourse($id){
        $user = Auth::user();
        $course = Course::where('id',$id)->first();
        $teacher = User::where('id', $course->teacher_id)->first();
        $students = CourseUser::with(['course', 'user'])->where('course_id', $id)->count();
        $unread = $this->checkMails();
        return view('course.courses.detail', compact('user', 'course', 'students', 'teacher', 'unread'));
    }

    public function editCourse($id){
        $user = Auth::user();
        $course = Course::where('id',$id)->first();
        $teacher = User::where('id', $course->teacher_id)->first();
        $students = CourseUser::with(['course', 'user'])->where('course_id', $id)->count();
        $unread = $this->checkMails();
        return view('course.courses.edit', compact('user', 'course', 'teacher', 'students', 'unread'));
    }

    public function updateCourse(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'season' => 'required',
            'length' => 'required',
            'class' => 'required',
            'status' => 'required',
        ]);

        Course::where('id', $id)->update([
            'name' => $request->name,
            'description' => $request->desc,
            'season' => $request->season,
            'length' => $request->length,
            'class' => $request->class,
            'status' => $request->status,
            'updated_at' => now(),
        ]);

        return redirect()->route('progress');
    }

    public function deleteCourse($id){
        Course::where('id',$id)->delete();
        CourseUser::where('course_id',$id)->delete();
        return redirect()->route('progress');
    }
}
