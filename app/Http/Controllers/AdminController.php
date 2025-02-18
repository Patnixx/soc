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
                return view('errors.403');
            }
        }
        return view('errors.403');
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
                return view('errors.403');
            }
        }
        return view('errors.403');
    }

    public function usersCreate(){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                return view('admin.users.create', compact('user'));
            }
            else{
                return view('errors.403');
            }
        }
        return view('errors.403');
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
                    'birthday' => 'required|date',
                    'telephone' => 'required|max:15',
                    'email_verify' => 'nullable',
                ], 
                [
                    'f_name.required' => __('validation.custom.f_name.required'),
                    'l_name.required' => __('validation.custom.l_name.required'),
                    'email.required' => __('validation.custom.email.required'),
                    'email.email' => __('validation.custom.email.email'),
                    'email.unique' => __('validation.custom.email.unique'),
                    'pass.required' => __('validation.custom.pass.required'),
                    'pass.min' => __('validation.custom.pass.min'),
                    'pass.regex' => __('validation.custom.pass.regex'),
                    'c_pass.required' => __('validation.custom.c_pass.required'),
                    'c_pass.same' => __('validation.custom.c_pass.same'),
                    'role.required' => __('validation.custom.role.required'),
                    'birthday.required' => __('validation.custom.birthday.required'),
                    'birthday.date' => __('validation.custom.birthday.date'),
                    'telephone.required' => __('validation.custom.telephone.required'),
                    'telephone.max' => __('validation.custom.telephone.max'),
                ]);

                if($request->has('email_verify')){
                    $user = User::create([
                        'f_name' => $request->f_name,
                        'l_name' => $request->l_name,
                        'email' => $request->email,
                        'password' => Hash::make($request->pass),
                        'role' => $request->role,
                        'birthday' => $request->birthday,
                        'tel_number' => $request->telephone,
                        'email_verified_at' => now(),
                    ]);

                    return redirect()->route('users');
                }
                else{
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
            }
            else{
                return view('errors.403');
            }
        }
        return view('errors.403');
    }

    public function usersEdit($id){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                $user = Auth::user();
                $account = User::find($id);
                return view('admin.users.edit', compact('user', 'account'));
            }
            else{
                return view('errors.403');
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
                    'pass' => 'nullable|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
                    'c_pass' => 'nullable|same:pass',
                    'role' => 'required',
                    'birthday' => 'required',
                    'telephone' => 'required',
                    'email_verify' => 'nullable',
                ], 
                [
                    'f_name.required' => __('validation.custom.f_name.required'),
                    'l_name.required' => __('validation.custom.l_name.required'),
                    'email.required' => __('validation.custom.email.required'),
                    'email.email' => __('validation.custom.email.email'),
                    'email.unique' => __('validation.custom.email.unique'),
                    'pass.required' => __('validation.custom.pass.required'),
                    'pass.min' => __('validation.custom.pass.min'),
                    'pass.regex' => __('validation.custom.pass.regex'),
                    'c_pass.required' => __('validation.custom.c_pass.required'),
                    'c_pass.same' => __('validation.custom.c_pass.same'),
                    'role.required' => __('validation.custom.role.required'),
                    'birthday.required' => __('validation.custom.birthday.required'),
                    'birthday.date' => __('validation.custom.birthday.date'),
                    'telephone.required' => __('validation.custom.telephone.required'),
                    'telephone.max' => __('validation.custom.telephone.max'),
                ]);

                User::where('id', $id)->update([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'role' => $request->role,
                    'birthday' => $request->birthday,
                    'tel_number' => $request->telephone,
                ]);

                if($request->has('email_verify')){
                    User::where('id', $id)->update([
                        'email_verified_at' => now(),
                    ]);
                }

                if($request->has('pass')){
                    User::where('id', $id)->update([
                        'password' => Hash::make($request->pass),
                    ]);
                }

                return redirect()->route('users');
            }
            else{
                return view('errors.403');
            }
        }
        return view('errors.403');
    }

    public function usersDelete($id){
        if(Auth::check()){
            if(Auth::user()->role=="Admin"){
                User::where('id', $id)->delete();
                return redirect()->route('users');
            }
            else{
                return view('errors.403');
            }
        }
        return view('errors.403');
    }
}
