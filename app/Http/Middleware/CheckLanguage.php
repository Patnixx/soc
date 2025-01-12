<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class CheckLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if($user && is_null($user->language) && !session()->has('show_language_popup'))
        {
            Session::flash('show_language_popup', true);
        }
        if($user && $user->language)
        {
            app()->setLocale($user->language);
        }
        else
        {
            app()->setLocale(session('locale', config('app.locale')));
        }
        return $next($request);
    }
}
