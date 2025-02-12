@extends('structures.auth')
@section('title', ''.__('auth.reset-password').'')
@section('form')
    <div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6">
        <form action="{{route('password.update')}}" method="POST" class="w-full sm:w-3/4 max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
            @csrf
            <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">
                {{__('auth.reset-password')}}
            </h2>
            <div class="flex flex-col space-y-2 mb-2">
                <input type="hidden" name="token" value="{{ $token }}">
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="email" class="text-sm font-medium dark:text-white text-gray-900">
                    {{__('auth.email')}}
                </label>
                <input type="email" name="email" id="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300" required autofocus>
            </div>
            <div>
                <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.n-pass') }}</label>
                <input type="password" id="password" name="password" placeholder="{{__('auth.pass-placeholder')}}" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300" required autofocus>
            </div>
            <div>
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.c-pass') }}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="{{__('auth.c-pass')}}" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300" required autofocus>
            </div>
            <div class="relative pb-4">                    
                <span id="strength-text" class="text-sm text-m-blue">{{__('auth.pass-strength')}}</span>
                <div id="password-strength-bar" class="h-2 mt-4.75 dark:bg-gray-800 bg-slate-200 rounded-full overflow-hidden w-full">
                    <div id="strength-level" class="h-full rounded-full transition-all" style="width: 0%;"></div>
                </div>                
            </div>
            <button type="submit" class="w-full bg-m-blue text-gray-900 dark:bg-m-blue dark:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear hover:bg-m-red hover:text-white dark:hover:bg-m-darkblue">
                {{__('auth.reset-password')}}
            </button>
        </form>
        <div class="flex flex-col md:flex-row justify-center items-center space-x-4 pt-8">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'back'" :route="'login'" :sclass="'left-14'"/>
        </div>
    </div>
@endsection
