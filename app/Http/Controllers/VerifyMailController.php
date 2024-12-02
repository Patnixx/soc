<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyMailController extends Controller
{
    //
    public function verifyNotice() {
        return view('auth.notice');
    }

    public function verifyHandler(EmailVerificationRequest $request) {
        $request -> fulfill();

        return redirect('/');
    }

    public function resendEmail(Request $request){
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
