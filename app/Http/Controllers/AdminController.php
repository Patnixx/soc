<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function adminIndex(){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                return view('admin.admin', compact('user'));
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }

    //*SECTION User CRUD methods
    public function usersIndex(){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                $accounts = User::query()->simplePaginate(10);
                return view('admin.users.users', compact('user', 'accounts'));
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }

    public function usersCreate(){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                return view('admin.users.create', compact('user'));
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }

    public function usersStore(Request $request){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $request->validate([
                    'f_name' => 'required',
                    'l_name' => 'required',
                    'email' => 'required|email|unique:users',
                    'pass' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                    'c_pass' => 'required|same:pass',
                    'role' => 'required',
                    'birthday' => 'required',
                    'telephone' => 'required',
                ], 
                [
                    'pass.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.',
                    'c_pass.same' => 'Passwords do not match.',
                    'pass.min' => 'Password must be at least 8 characters long.',
                ]);

                $user = User::create([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->pass),
                    'role' => $request->role,
                    'birthday' => $request->birthday,
                    'tel_number' => $request->telephone,
                ]);

                event(new Registered($user));

                return redirect()->route('users');
            }
            else{
                return redirect()->route('home');
            }
        }
        return redirect()->route('home');
    }

    public function usersEdit($id){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                $account = User::find($id);
                return view('admin.users.edit', compact('user', 'account'));
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }

    public function usersUpdate(Request $request, $id){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $acc = User::find($id);
                $request->validate([
                    'f_name' => 'required',
                    'l_name' => 'required',
                    'email' => 'required',
                    'pass' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                    'c_pass' => 'required|same:pass',
                    'role' => 'required',
                    'birthday' => 'required',
                    'telephone' => 'required',
                ], 
                [
                    'pass.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.',
                    'c_pass.same' => 'Passwords do not match.',
                    'pass.min' => 'Password must be at least 8 characters long.',
                ]);

                User::where('id', $id)->update([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->pass),
                    'role' => $request->role,
                    'birthday' => $request->birthday,
                    'tel_number' => $request->telephone,
                ]);

                return redirect()->route('users');
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }

    public function usersDelete($id){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                User::where('id', $id)->delete();
                return redirect()->route('users');
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
    }
}
