<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
                return redirect()->route('admin')->withSuccess('Signed in');
            }
            return redirect()->route('/')->withSuccess('Signed in');
        }
        $validator['email'] = 'Email is missing or incorrect!';
        $validator['password'] = 'Password is missing or incorrect!';
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
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
            'c_pass' => 'required|same:password',
            'birthday' => 'required',
            'telephone' => 'required',
        ], 
        [
            'pass.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.',
            'c_pass.same' => 'Passwords do not match.',
            'pass.min' => 'Password must be at least 8 characters long.',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('/')->withSuccess('You have signed-in');
        }

        return redirect('/')->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
        return User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'tel_number' => $data['telephone'],
        ]);

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('/');
    }
}
