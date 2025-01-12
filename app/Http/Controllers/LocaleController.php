<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocaleController extends Controller
{
    //
    public function setLanguage(Request $request)
    {
        $request->validate(['language' => 'required|in:en,sk']);

        $language = $request->language;

        if(Auth::check())
        {
            $user = Auth::user();
            User::where('id', $user->id)->update(['language' => $language]);
        }

        app()->setLocale($language);
        session(['locale' => $language]);

        return response()->json(['message' => 'Language has been set']);
    }
}
