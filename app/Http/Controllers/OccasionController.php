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
                $unread = $this->checkMails();
                return view('occasion.index', compact('user', 'events', 'unread'));
            }
            if($user->role == 'Student')
            {
                $courseIds = CourseUser::where('user_id', $userId)->pluck('course_id');
                $courseInfo = Course::whereIn('id', $courseIds)->get();
                $events = Occasion::with('course')
                    ->where(function ($query) use ($courseIds) {
                        $query->whereIn('course_id', $courseIds)
                            ->whereNull('user_id');
                    })
                    ->orWhere(function ($query) use ($courseIds, $userId) {
                        $query->whereIn('course_id', $courseIds)
                            ->where('user_id', '=', $userId);
                    })
                    ->orderByRaw('ABS(TIMESTAMPDIFF(SECOND, start, NOW()))') // Closest events first
                    ->simplePaginate(5);
                $unread = $this->checkMails();
                return view('occasion.index', compact('user', 'events', 'courseInfo', 'unread'));
            }
        }
        return redirect()->back();
    }

    public function create_theory(){
        $user = Auth::user();
        if($user->role != 'User')
        {
            if($user->role == 'Teacher')
            {
                $courses = Course::where('teacher_id', $user->id)->get();
                $unread = $this->checkMails();
                return view('occasion.create-theory', compact('user', 'courses', 'unread'));
            }
            if($user->role == 'Admin')
            {
                $courses = Course::all();
                $unread = $this->checkMails();
                return view('occasion.create-theory', compact('user', 'courses', 'unread'));
            }
            return redirect()->back();
        }
    }

    public function create_ride(){
        $user = Auth::user();
        if($user->role != 'User')
        {
            if($user->role == 'Teacher')
            {
                $courses = Course::where('teacher_id', $user->id)->get();
                $unread = $this->checkMails();
                return view('occasion.create-ride', compact('user', 'courses', 'unread'));
            }
            if($user->role == 'Admin')
            {
                $courses = Course::all();
                $unread = $this->checkMails();
                return view('occasion.create-ride', compact('user', 'courses', 'unread'));
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
            $unread = $this->checkMails();
            return view('occasion.assign-ride', compact('user', 'students', 'courseid', 'unread'));
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
                'type' => 'Theory',
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
                'type' => 'Ride',
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

    public function edit($id)
    {
        $user = Auth::user();
        $event = Occasion::where('id', $id)->first();
        $course = Course::where('id', $event->course_id)->first();
        $students = CourseUser::with('user')->where('course_id', $event->course_id)->get();
        if($user->role != 'User' && $user->role != 'Student')
        {
            if($event->type == 'Theory')
            {
                if($user->role == 'Teacher')
                {
                    $courses = Course::where('teacher_id', $user->id)->get();
                    $unread = $this->checkMails();
                    return view('occasion.edit', compact('user', 'event', 'courses', 'unread'));
                }
                if($user->role == 'Admin')
                {
                    $courses = Course::all();
                    return view('occasion.edit', compact('user', 'event', 'courses'));
                }
            }
            if($event->type == 'Ride')
            {
                if($user->role == 'Teacher' || $user->role == 'Admin')
                {
                    $unread = $this->checkMails();
                    return view('occasion.edit', compact('user', 'event', 'students', 'unread'));
                }
            }
        }
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $event = Occasion::where('id', $id)->first();
        $user = Auth::user();
        if($user->role != 'User' && $user->role != 'Student')
        {
            if($event->type == 'Theory')
            {
                $request->validate([
                    'course' => 'required',
                    'name' => 'required',
                    'start' => 'required',
                ]);

                $event = Occasion::where('id', $id)->update([
                    'course_id' => $request->course,
                    'name' => $request->name,
                    'start' => $request->start,
                ]);
                return redirect()->route('events');
            }
            if($event->type == 'Ride')
            {
                $request->validate([
                    'user' => 'required',
                    'name' => 'required',
                    'start' => 'required',
                ]);

                $event = Occasion::where('id', $id)->update([
                    'user_id' => $request->user,
                    'name' => $request->name,
                    'start' => $request->start,
                ]);
                return redirect()->route('events');
            }
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $user = Auth::user();
        if($user->role != 'User' && $user->role != 'Student')
        {
            if($user->role == 'Teacher' || $user->role == 'Admin')
            {
                Occasion::where('id', $id)->delete();
                return redirect()->route('events');
            }
        }
        return redirect()->back();
    }
}
