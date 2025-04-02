<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Message;
use App\Models\Occasion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class OccasionController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        
        if(Auth::check() && $user->role != 'User')
        {
            $userId = $user->id;
            $currentTime = Carbon::now();
            if($user->role == 'Admin')
            {
                $events = Occasion::with('course')->where('start', '>', $currentTime)->simplePaginate(5);
                return view('occasion.index', compact('user', 'events'));
            }

            if($user->role == 'Teacher')
            {
                $events = Occasion::with('course')->where('start', '>', $currentTime)->whereHas('course', function($q) use($user){
                    $q->where('teacher_id', $user->id);
                })->orderByRaw('ABS(TIMESTAMPDIFF(SECOND, start, NOW()))')->simplePaginate(5);
                $unread = $this->checkMails();
                return view('occasion.index', compact('user', 'events', 'unread'));
            }
            if($user->role == 'Student')
            {
                $courseIds = CourseUser::where('user_id', $userId)->pluck('course_id');
                $courseInfo = Course::whereIn('id', $courseIds)->get();
                $events = Occasion::with('course')
                    ->where('start', '>', $currentTime)
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
        return view('errors.403');
    }

    public function select(){
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' && $user->role != 'Student'))
        {
            $unread = $this->checkMails();
            return view('occasion.select', compact('user', 'unread'));
        }
    }

    public function create_theory(){
        $user = Auth::user();
        if(Auth::check() && $user->role != 'User')
        {
            if($user->role == 'Teacher')
            {
                //$courses = Course::where('teacher_id', $user->id)->get();
                $courses = Course::where('teacher_id', $user->id)
                ->whereHas('occasions', function ($query) {
                    $query->where('type', 'Theory')
                        ->groupBy('course_id')
                        ->havingRaw('COUNT(*) < 10');
                })
                ->get();
                $unread = $this->checkMails();
                return view('occasion.create-theory', compact('user', 'courses', 'unread'));
            }
            if($user->role == 'Admin')
            {
                //$courses = Course::all();
                $courses = Course::whereHas('occasions', function ($query) {
                    $query->where('type', 'Theory')
                        ->groupBy('course_id')
                        ->havingRaw('COUNT(*) < 10');
                })
                ->get();
                $unread = $this->checkMails();
                return view('occasion.create-theory', compact('user', 'courses', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function create_ride(){
        $user = Auth::user();
        if(Auth::check() && $user->role != 'User')
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
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function assign_ride(Request $request){
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Teacher' || $user->role == 'Admin')
            {
                $request->validate([
                    'course' => 'required',
                ]);

                $courseid = $request->course;

                //$students = CourseUser::with('user')->where('course_id', $courseid)->get();
                $students = CourseUser::with('user')
                ->where('course_id', $courseid)
                ->whereHas('user', function ($query) {
                    $query->whereHas('occasions', function ($subQuery) {
                        $subQuery->where('type', 'Ride')
                            ->groupBy('user_id')
                            ->havingRaw('COUNT(*) < 18');
                    });
                })
                ->get();
                $unread = $this->checkMails();
                return view('occasion.assign-ride', compact('user', 'students', 'courseid', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function store_theory(Request $request){
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' || $user->role != 'Student'))
        {
            $request->validate([
                'course' => 'required',
                'name' => 'required',
                'start' => 'required',
            ]);

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']);
            switch($browserLocale){
                case('en'):
                    $message = "You have been assigned a theory lesson for this date and time: ".$request->start." . If you have a problem attending on that day, contact your course teacher. Nixxy";
                    $type = 'Theory';
                    break;
                case('sk'):
                    $message = "Bola Vám priradená lekcia teórie na tento dátum a čas: ".$request->start." . Ak máte v daný deň problém sa dostaviť, kontaktujte Vášho učiteľa kurzu. Nixxy";
                    $type = 'Teória';
                    break;
            }

            Occasion::create([
                'course_id' => $request->course,
                'name' => $request->name,
                'start' => $request->start,
                'type' => 'Theory',
                'creator_id' => $user->id,
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
        return view('errors.403');
    }

    public function store_ride(Request $request, $courseid){
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' || $user->role != 'Student'))
        {
            $request->validate([
                'name' => 'required',
                'start' => 'required',
                'user' => 'required',
            ]);

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']);
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
                'creator_id' => $user->id,
            ]);

            Message::create([
                'sender_id' => $user->id,
                'receiver_id' => $request->user,
                'title'=> ''.$type.'',
                'content' => $message,
            ]);
            
            return redirect()->route('events');
        }
        return view('errors.403');

    }

    public function create_vp()
    {
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' && $user->role != 'Student'))
        {
            if($user->role == 'Teacher')
            {
                $courses = Course::where('teacher_id', $user->id)->get();
                $unread = $this->checkMails();
                return view('occasion.create-vp', compact('user', 'courses', 'unread'));
            }
            if($user->role == 'Admin')
            {
                $courses = Course::all();
                return view('occasion.create-vp', compact('user', 'courses'));
            }
            return view('errors.403');
        }
    }

    public function assign_vp(Request $request)
    {
        $user = Auth::user();
        if(Auth::check())
        {
            if($user->role == 'Teacher' || $user->role == 'Admin')
            {
                $request->validate([
                    'course' => 'required',
                ]);

                $courseid = $request->course;

                //$students = CourseUser::with('user')->where('course_id', $courseid)->get();
                $students = CourseUser::with('user')
                ->where('course_id', $courseid)
                ->whereHas('user', function ($query) {
                    $query->whereHas('occasions', function ($subQuery) {
                        $subQuery->where('type', 'VP')
                            ->groupBy('user_id')
                            ->havingRaw('COUNT(*) < 2');
                    });
                })
                ->get();
                $unread = $this->checkMails();
                return view('occasion.assign-vp', compact('user', 'students', 'courseid', 'unread'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function store_vp(Request $request, $courseid)
    {
        $user = Auth::user();
        if(Auth::check() && ($user->role == 'Teacher' || $user->role == 'Admin'))
        {
            $request->validate([
                'name' => 'required',
                'start' => 'required',
                'user' => 'required',
            ]);

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']);
            switch($browserLocale){
                case('en'):
                    $message = "You have been assigned a virtual practice ride for this date and time: ".$request->start." . If you have a problem attending on that day, contact your course teacher. Nixxy";
                    $type = 'Virtual Practice Lesson';
                    break;
                case('sk'):
                    $message = "Bol Vám priradený trenažér na tento dátum a čas: ".$request->start." . Ak máte v daný deň problém sa dostaviť, kontaktujte Vášho učiteľa kurzu. Nixxy";
                    $type = 'Trenažér';
                    break;
            }

            Occasion::create([
                'course_id' => $courseid,
                'user_id' => $request->user,
                'name' => $request->name,
                'start' => $request->start,
                'type' => 'VP',
                'creator_id' => $user->id,
            ]);

            Message::create([
                'sender_id' => $user->id,
                'receiver_id' => $request->user,
                'title'=> ''.$type.'',
                'content' => $message,
            ]);
            
            return redirect()->route('events');
        }
        return view('errors.403');
    }

    public function create_kpp()
    {
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' && $user->role != 'Student'))
        {
            if($user->role == 'Teacher')
            {
                //$courses = Course::where('teacher_id', $user->id)->get();
                $courses = Course::where('teacher_id', $user->id)
                ->whereHas('occasions', function ($query) {
                    $query->where('type', 'KPP')
                        ->groupBy('course_id')
                        ->havingRaw('COUNT(*) < 1');
                })
                ->get();
                $unread = $this->checkMails();
                return view('occasion.create-kpp', compact('user', 'courses', 'unread'));
            }
            if($user->role == 'Admin')
            {
                //$courses = Course::all();
                $courses = Course::whereHas('occasions', function ($query) {
                    $query->where('type', 'KPP')
                        ->groupBy('course_id')
                        ->havingRaw('COUNT(*) < 1');
                })
                ->get();
                return view('occasion.create-kpp', compact('user', 'courses'));
            }
            return view('errors.403');
        }
    }

    public function store_kpp(Request $request)
    {
        $user = Auth::user();
        if(Auth::check() && ($user->role == 'Admin' || $user->role == 'Teacher'))
        {
            $request->validate([
                'course' => 'required',
                'name' => 'required',
                'start' => 'required',
            ]);

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']);
            switch($browserLocale){
                case('en'):
                    $message = "You have been assigned a CPR Course for this date and time: ".$request->start." . If you have a problem attending on that day, contact your course teacher. Nixxy";
                    $type = 'CPR Course';
                    break;
                case('sk'):
                    $message = "Bol Vám priradený Kurz Prvej Pomoci na tento dátum a čas: ".$request->start." . Ak máte v daný deň problém sa dostaviť, kontaktujte Vášho učiteľa kurzu. Nixxy";
                    $type = 'Kurz Prvej Pomoci';
                    break;
            }

            Occasion::create([
                'course_id' => $request->course,
                'name' => $request->name,
                'start' => $request->start,
                'type' => 'KPP',
                'creator_id' => $user->id,
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
        return view('errors.403');
    }

    public function create_exam()
    {
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' && $user->role != 'Student'))
        {
            if($user->role == 'Teacher')
            {
                //$courses = Course::where('teacher_id', $user->id)->get();
                $courses = Course::where('teacher_id', $user->id)
                ->whereHas('occasions', function ($query) {
                    $query->where('type', 'Exam')
                        ->groupBy('course_id')
                        ->havingRaw('COUNT(*) < 1');
                })
                ->get();
                $unread = $this->checkMails();
                return view('occasion.create-exam', compact('user', 'courses', 'unread'));
            }
            if($user->role == 'Admin')
            {
                //$courses = Course::all();
                $courses = Course::whereHas('occasions', function ($query) {
                    $query->where('type', 'Exam')
                        ->groupBy('course_id')
                        ->havingRaw('COUNT(*) < 1');
                })
                ->get();
                return view('occasion.create-exam', compact('user', 'courses'));
            }
            return view('errors.403');
        }
        return view('errors.403');
    }

    public function store_exam(Request $request){
        $user = Auth::user();
        if(Auth::check() && ($user->role == 'Teacher' || $user->role == 'Admin'))
        {
            $request->validate([
                'course' => 'required',
                'name' => 'required',
                'start' => 'required',
            ]);

            $browserLocale = $request->getPreferredLanguage(['en', 'sk']);
            switch($browserLocale){
                case('en'):
                    $message = "You have been assigned a Final exam for this date and time: ".$request->start." . If you have a problem attending on that day, contact your course teacher. Nixxy";
                    $type = 'Final exam';
                    break;
                case('sk'):
                    $message = "Bol Vám priradený termín na vodičské skúšky na tento dátum a čas: ".$request->start." . Ak máte v daný deň problém sa dostaviť, kontaktujte Vášho učiteľa kurzu. Nixxy";
                    $type = 'Vodičské skúšky';
                    break;
            }

            Occasion::create([
                'course_id' => $request->course,
                'name' => $request->name,
                'start' => $request->start,
                'type' => 'Exam',
                'creator_id' => $user->id,
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
        return view('errors.403');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $event = Occasion::where('id', $id)->first();
        if(Auth::check() && ($user->role != 'User' || $user->role != 'Student'))
        {
            if($event->type == 'Theory')
            {
                if($user->role == 'Teacher')
                {
                    $courses = Course::where('teacher_id', $user->id)
                    ->whereHas('occasions', function ($query) {
                        $query->where('type', 'Theory')
                            ->groupBy('course_id')
                            ->havingRaw('COUNT(*) < 10');
                    })
                    ->get();
                    $unread = $this->checkMails();
                    return view('occasion.edit', compact('user', 'event', 'courses', 'unread'));
                }
                if($user->role == 'Admin')
                {
                    $courses = Course::whereHas('occasions', function ($query) {
                        $query->where('type', 'Exam')
                            ->groupBy('course_id')
                            ->havingRaw('COUNT(*) < 10');
                    })
                    ->get();
                    return view('occasion.edit', compact('user', 'event', 'courses'));
                }
            }
            if($event->type == 'Ride')
            {
                if($user->role == 'Teacher' || $user->role == 'Admin')
                {
                    $unread = $this->checkMails();
                    $students = CourseUser::with('user')
                    ->where('course_id', $event->course_id)
                    ->whereHas('user', function ($query) {
                        $query->whereHas('occasions', function ($subQuery) {
                            $subQuery->where('type', 'Ride')
                                ->groupBy('user_id')
                                ->havingRaw('COUNT(*) < 18');
                        });
                    })
                    ->get();
                    return view('occasion.edit', compact('user', 'event', 'students', 'unread'));
                }
            }
            if($event->type == 'VP')
            {
                if($user->role == 'Teacher' || $user->role == 'Admin')
                {
                    $unread = $this->checkMails();
                    $students = CourseUser::with('user')
                    ->where('course_id', $event->course_id)
                    ->whereHas('user', function ($query) {
                        $query->whereHas('occasions', function ($subQuery) {
                            $subQuery->where('type', 'VP')
                                ->groupBy('user_id')
                                ->havingRaw('COUNT(*) < 2');
                        });
                    })
                    ->get();
                    return view('occasion.edit', compact('user', 'event', 'students', 'unread'));
                }
            }
            if($event->type == 'KPP')
            {
                if($user->role == 'Teacher')
                {
                    $courses = Course::where('teacher_id', $user->id)
                    ->whereHas('occasions', function ($query) {
                        $query->where('type', 'KPP')
                            ->groupBy('course_id')
                            ->havingRaw('COUNT(*) < 1');
                    })
                    ->get();
                    $unread = $this->checkMails();
                    return view('occasion.edit', compact('user', 'event', 'courses', 'unread'));
                }
                elseif($user->role == 'Admin')
                {
                    $courses = Course::whereHas('occasions', function ($query) {
                        $query->where('type', 'Exam')
                            ->groupBy('course_id')
                            ->havingRaw('COUNT(*) < 1');
                    })
                    ->get();
                    return view('occasion.edit', compact('user', 'event', 'courses'));
                }
            }
            if($event->type == 'Exam')
            {
                if($user->role == 'Teacher')
                {
                    $courses = Course::where('teacher_id', $user->id)
                    ->whereHas('occasions', function ($query) {
                        $query->where('type', 'Exam')
                            ->groupBy('course_id')
                            ->havingRaw('COUNT(*) < 1');
                    })
                    ->get();
                    $unread = $this->checkMails();
                    return view('occasion.edit', compact('user', 'event', 'courses', 'unread'));
                }
                elseif($user->role == 'Admin')
                {
                    $courses = Course::whereHas('occasions', function ($query) {
                        $query->where('type', 'Exam')
                            ->groupBy('course_id')
                            ->havingRaw('COUNT(*) < 1');
                    })
                    ->get();
                    return view('occasion.edit', compact('user', 'event', 'courses'));
                }
            }
        }
        return view('errors.403');
    }

    public function update(Request $request, $id)
    {
        $event = Occasion::where('id', $id)->first();
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' && $user->role != 'Student'))
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
            if($event->type == 'VP')
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
            if($event->type == 'KPP')
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
            if($event->type == 'Exam')
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
        }
        return view('errors.403');
    }

    public function delete($id)
    {
        $user = Auth::user();
        if(Auth::check() && ($user->role != 'User' && $user->role != 'Student'))
        {
            if($user->role == 'Teacher' || $user->role == 'Admin')
            {
                Occasion::where('id', $id)->delete();
                return redirect()->route('events');
            }
        }
        return view('errors.403');
    }
}
