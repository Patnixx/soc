<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function loginAuth(Request $request)
    {
        $validator = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 'Admin') {
                return redirect()->intended('/')->withSuccess('Signed in');
            }
            return redirect()->intended('login')->withSuccess('Signed in');
        }
        $validator['emailPassword'] = 'Email is missing';
        $validator['password'] = 'Password is missing';
        $validator['emailPassword'] = 'Email address or password is incorrect';
        return redirect('login')->withErrors($validator);

    }

    public function registerIndex()
    {
        return view('auth.register');
    }

    public function registerAuth(Request $request)
    {
        $request->validate([
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'c_pass' => 'required|same:password',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/')->withSuccess('You have signed-in');
        }

        return redirect('/')->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
