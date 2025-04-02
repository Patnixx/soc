<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Form;
use App\Models\Message;
use App\Models\Occasion;
use App\Models\Stat;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    //
    public function profileIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.index', compact('user', 'unread'));   ;
        }
        return redirect()->route('home');
    }

    public function updatePersonal(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'f_name' => 'nullable|string|max:75',
            'l_name' => 'nullable|string|max:75',
            'email' => 'nullable|email',
            'birthday' => 'nullable|date',
            'phone' => 'nullable|string|max:12',
            'fileInput' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('fileInput')) {

            $file = $request->file('fileInput');
            $imageHash = Hash::make(time());
            $imageHash = str_replace('/', '_', $imageHash);
            $imageName = $imageHash . '.' . $file->getClientOriginalExtension();
            $imagePath = public_path('assets/pfp/');

            if($user->pfp_path)
            {
                File::delete($imagePath . $user->pfp_path);
                $file->move($imagePath, $imageName);
                User::where('id', $user->id)->update([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'birthday' => $request->birthday,
                    'tel_number' => $request->phone,
                    'pfp_path' => $imageName,
                ]);
                return redirect()->route('profile');
            }

            $file->move($imagePath, $imageName);
            User::where('id', $user->id)->update([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'email' => $request->email,
                'birthday' => $request->birthday,
                'tel_number' => $request->phone,
                'pfp_path' => $imageName,
            ]);

            return redirect()->route('profile');
        }

        $userId = Auth::id();
        User::where('id', $userId)->update([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'birthday' => $request->birthday,
            'tel_number' => $request->phone,
        ]);

        return redirect()->route('profile');
    }

    public function progressIndex()
    {
        $user = Auth::user();
        $currentTime = Carbon::now();

        $userStat = Stat::where('user_id', $user->id)->first();
        if($user->role == 'Teacher')
        {
            $endCourses = Course::where('teacher_id', $user->id)->where('status', 'Finished')->count();
            $endTheory = Occasion::where('creator_id', $user->id)->where('type', 'Theory')->where('start', '<', $currentTime)->count();
            $endPractice = Occasion::where('creator_id', $user->id)->where('type', 'Ride')->where('start', '<', $currentTime)->count();
            $endVPractice = Occasion::where('creator_id', $user->id)->where('type', 'VP')->where('start', '<', $currentTime)->count();
            Stat::where('user_id', $user->id)->update([
                'ended_courses_count' => $endCourses,
                'ended_theory_count' => $endTheory,
                'ended_virtual_practice_count' => $endVPractice,
                'ended_practice_count' => $endPractice,
            ]);
        }

        if($user->role == 'Student')
        {
            $theories = Occasion::where('user_id', $user->id)->where('type', 'Theory')->where('start', '<', $currentTime)->count();
            $vpractices = Occasion::where('user_id', $user->id)->where('type', 'VP')->where('start', '<', $currentTime)->count();
            $practices = Occasion::where('user_id', $user->id)->where('type', 'Ride')->where('start', '<', $currentTime)->count();
            $kpp = Occasion::where('user_id', $user->id)->where('type', 'KPP')->where('start', '<', $currentTime)->count();
            $exam = Occasion::where('user_id', $user->id)->where('type', 'Exam')->where('start', '<', $currentTime)->count();

            Stat::where('user_id', $user->id)->update([
                'theory_count' => $theories,
                'virtual_practice_count' => $vpractices,
                'practice_count' => $practices,
                'kpp_count' => $kpp,
                'exam_count' => $exam,
            ]);
        }

        if($user->role == 'Student' || $user->role == 'Teacher')
        {
            $unread = $this->checkMails();
            $courses = CourseUser::where('user_id', $user->id)->get();
            $stat_table = Stat::where('user_id', $user->id)->first();

            if($user->language == 'en')
            {
                $statJson = json_decode(file_get_contents(resource_path('json/stats_en.json')), true);
            }
            elseif($user->language == 'sk')
            {
                $statJson = json_decode(file_get_contents(resource_path('json/stats_sk.json')), true);
            }
            $categories = [
                'theory_count' => 'theory',
                'virtual_practice_count' => 'virtual_practice',
                'practice_count' => 'practice',
                'kpp_count' => 'kpp',
                'exam_count' => 'exam',
                'ended_courses_count' => 'ended',
                'ended_theory_count' => 'ended',
                'ended_virtual_practice_count' => 'ended',
                'ended_practice_count' => 'ended'
            ];

            $stats = [];

            foreach($categories as $dbColumn => $jsonKey)
            {
                $userValue = $stat_table->$dbColumn;

                if (is_null($userValue)) {
                    continue;
                }

                if(!isset($statJson[$jsonKey])){
                    continue;
                }

                foreach($statJson[$jsonKey] as $range) {
                    $min = $range['min'];
                    $max = $range['max'] ?? $min;

                    if ($userValue >= $min && $userValue <= $max) {
                        $stats[$dbColumn] = [
                            'title' => $range['title'],
                            'color' => $range['color'],
                            'value' => $userValue,
                            'min' => $min,
                            'max' => $max
                        ];
                        break;
                    }
                }
            }
            return view('profile.progress', compact('courses', 'unread', 'user', 'stats'));
        }
        return redirect()->route('home');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'cpass' => 'required|same:password',
        ]);

        if($request->current_password == $request->password)
        {
            return redirect()->route('profile')->withErrors(['password' => 'New password cannot be the same as the current password']);
        }

        $pass = Hash::make($request->password);
        $userId = Auth::id();
        if(Hash::check($request->cpass, $pass))
        {
            User::where('id', $userId)->update([
                'password' => bcrypt($request->password),
            ]);
        }
        else
        {
            return redirect()->route('profile')->withErrors(['cpass' => 'Current password is incorrect']);
        }
        

        return redirect()->route('profile');
    }

    public function deleteAccount(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $userId = Auth::id();
        $pass = Hash::make($request->password);
        if(Hash::check($request->password, $pass))
        {
            Auth::logout();
            $forms = Form::where('user_id', $userId)->get();
            foreach($forms as $form){
                Form::where('id', $form->id)->delete();
            }
            $messages = Message::where('sender_id', $userId)->orWhere('receiver_id', $userId)->get();
            foreach($messages as $message){
                Message::where('id', $message->id)->delete();
            }
            $courses = CourseUser::where('user_id', $userId)->get();
            foreach($courses as $course){
                CourseUser::where('id', $course->id)->delete();
            }
            User::where('id', $userId)->delete();
            return redirect()->route('home');
        }
        else
        {
            return redirect()->route('profile')->withErrors(['password' => 'Password is incorrect']);
        }
    }
}
