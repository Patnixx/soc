<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                $accounts = User::all();
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
                    'email' => 'required',
                    'password' => 'required',
                    'role' => 'required',
                    'birthday' => 'required',
                    'telephone' => 'required',
                ]);

                User::created([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role' => $request->role,
                    'birthday' => $request->birthday,
                    'telephone' => $request->telephone,
                ]);

                return redirect()->route('users');
            }
            else{
                return redirect('/');
            }
        }
        return redirect('/');
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
                $request->validate([
                    'f_name' => 'required',
                    'l_name' => 'required',
                    'email' => 'required',
                    //'password' => 'required',
                    'role' => 'required',
                    'birthday' => 'required',
                    'telephone' => 'required',
                ]);

                User::where('id', $id)->update([
                    'f_name' => $request->f_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    //'password' => bcrypt($request->password),
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
