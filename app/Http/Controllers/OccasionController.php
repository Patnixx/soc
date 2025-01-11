<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Message;
use App\Models\Occasion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OccasionController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $userId = $user->id;
        if($user->role != 'User')
        {   
            if($user->role == 'Admin')
            {
                $events = Occasion::with('course')->simplePaginate(10);
                return view('occasion.index', compact('user', 'events'));
            }

            if($user->role == 'Teacher')
            {
                $events = Occasion::with('course')->whereHas('course', function($q) use($user){
                    $q->where('teacher_id', $user->id);
                })->orderByRaw('ABS(TIMESTAMPDIFF(SECOND, start, NOW()))')->simplePaginate(10);
                return view('occasion.index', compact('user', 'events'));
            }
            if($user->role == 'Student')
            {
                $course = CourseUser::where('user_id', $userId)->first();
                $courseInfo = Course::where('id', $course->course_id)->get();
                $events = Occasion::with('course')->where(function ($query) use ($course) {
                    $query->where('course_id', $course->course_id)
                        ->whereNull('user_id');
                })->orWhere(function ($query) use ($course, $userId) {
                    $query->where('course_id', $course->course_id)
                        ->where('user_id', $userId);
                })
                ->orderByRaw('ABS(TIMESTAMPDIFF(SECOND, start, NOW()))')
                ->simplePaginate(10);
                return view('occasion.index', compact('user', 'events', 'courseInfo'));
            }
        }
        return redirect()->back();
    }

    public function create_theory(){
        $user = Auth::user();
        if($user->role != 'User')
        {
            if($user->role == 'Teacher' || $user->role == 'Admin')
            {
                $courses = Course::where('teacher_id', $user->id)->get();
                return view('occasion.create-theory', compact('user', 'courses'));
            }
            return redirect()->back();
        }
    }

    public function create_ride(){
        $user = Auth::user();
        if($user->role != 'User')
        {
            if($user->role == 'Teacher' || $user->role == 'Admin')
            {
                $courses = Course::where('teacher_id', $user->id)->get();
                return view('occasion.create-ride', compact('user', 'courses'));
            }
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function assign_ride(Request $request){
        $user = Auth::user();
        if($user->role == 'Teacher' || $user->role == 'Admin')
        {
            $request->validate([
                'course' => 'required',
            ]);

            $courseid = $request->course;

            $students = CourseUser::with('user')->where('course_id', $courseid)->get();
            return view('occasion.assign-ride', compact('user', 'students', 'courseid'));
        }
        return redirect()->back();
    }

    public function store_theory(Request $request){
        $user = Auth::user();
        if($user->role != 'User')
        {
            $request->validate([
                'course' => 'required',
                'name' => 'required',
                'start' => 'required',
            ]);

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']); // Specify supported languages
            switch($browserLocale){
                case('en'):
                    $message = "You have been assigned a theory lesson for this date and time: ".$request->start." . If you have a problem attending on that day, contact your course teacher. Nixxy";
                    $type = 'Theory';
                    break;
                case('sk'):
                    $message = "Bola Vám priradená lekica teórie na tento dátum a čas: ".$request->start." . Ak máte v daný deň problém sa dostaviť, kontaktujte Vášho učiteľa kurzu. Nixxy";
                    $type = 'Teória';
                    break;
            }

            Occasion::create([
                'course_id' => $request->course,
                'name' => $request->name,
                'start' => $request->start,
                'type' => $type,
            ]);
            
            $students = CourseUser::with('user')->where('course_id', $request->course)->get();
            foreach($students as $student)
            {
                Message::create([
                    'sender_id' => $user->id,
                    'receiver_id' => $student->user->id,
                    'title'=> ''.$type.'',
                    'content' => $message,
                ]);
            }  
            return redirect()->route('events');
        }
    }

    public function store_ride(Request $request, $courseid){
        $user = Auth::user();
        if($user->role != 'User')
        {
            $request->validate([
                'name' => 'required',
                'start' => 'required',
                'user' => 'required',
            ]);

            if($user->role == 'Admin')
            {
                return redirect()->route('events');
            }

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']); // Specify supported languages
            switch($browserLocale){
                case('en'):
                    $message = "You have been assigned a ride for this date and time: ".$request->start." . If you have a problem attending on that day, contact your course teacher. Nixxy";
                    $type = 'Ride';
                    break;
                case('sk'):
                    $message = "Bola Vám priradená jazda na tento dátum a čas: ".$request->start." . Ak máte v daný deň problém sa dostaviť, kontaktujte Vášho učiteľa kurzu. Nixxy";
                    $type = 'Jazda';
                    break;
            }

            Occasion::create([
                'course_id' => $courseid,
                'user_id' => $request->user,
                'name' => $request->name,
                'start' => $request->start,
                'type' => $type,
            ]);

            Message::create([
                'sender_id' => $user->id,
                'receiver_id' => $request->user,
                'title'=> ''.$type.'',
                'content' => $message,
            ]);
            
            return redirect()->route('events');
        }
    }
}
