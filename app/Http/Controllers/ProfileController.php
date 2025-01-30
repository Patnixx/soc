<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

            Storage::delete('public/pfp' . $user->pfp_path);

            $file = $request->file('fileInput');
            $imageHash = Hash::make(time());
            $imageHash = str_replace('/', '_', $imageHash);
            $imageName = $imageHash . '.' . $file->getClientOriginalExtension();

            if($user->pfp_path)
            {
                Storage::delete('public/pfp' . $user->pfp_path);
                $cesta = $file->storeAs('public/pfp', $imageName);
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

            $cesta = $file->storeAs('public/pfp', $imageName);
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
            User::where('id', $userId)->delete();
            return redirect()->route('home');
        }
        else
        {
            return redirect()->route('profile')->withErrors(['password' => 'Password is incorrect']);
        }
    }

    public function creditsIndex(){
        $user = Auth::user();
        if($user->role != 'Admin')
        {
            $unread = $this->checkMails();
            return view('profile.credits.index', compact('user', 'unread'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
