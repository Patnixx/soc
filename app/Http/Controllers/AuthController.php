<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
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

    public function forgotPasswordIndex()
    {
        return view('auth.forgot-pass');
    }

    public function forgotPasswordAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function resetPasswordIndex($token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
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

    public function notice()
    {
        if(Auth::check()){
            $user = Auth::user();
            $unread = $this->checkMails();
            return view('auth.verify-email', compact('user', 'unread'));
        }
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('/')->with('success', 'Email verified');
    }

    public function resend(Request $request)
    {
        if(!($request->user()->hasVerifiedEmail())){
            $request->user()->sendEmailVerificationNotification();
            $msg = ($request->user()->language == 'sk') ? 'Overovací odkaz bol zaslaný!' : 'Verification link sent!';
            return back()->with('message', $msg);
        }
    }

    public function create(array $data)
    {
        $user = User::create([
            'f_name' => $data['f_name'],
            'l_name' => $data['l_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'birthday' => $data['birthday'],
            'tel_number' => $data['telephone'],
        ]);

        event(new Registered($user));

        return $user;

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('/');
    }
}
