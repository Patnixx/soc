@extends('structures.auth')
@section('title', ''.__('title.login').'')
@section('form')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm sm:w-112 h-auto sm:h-144 bg-white dark:bg-gray-900 transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg px-6 py-8 sm:p-8 rounded-3xl">
        <h2 class="dark:text-m-blue text-gray-900 text-4xl font-serif mb-6 mt-8">{{__('auth.login')}}</h2>
        <form action="{{ route('custom.login')}}" method="post" class="w-full flex flex-col gap-4">
            @csrf
            <x-input-div :name="'email'" :type="'email'" :placeholder="'email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <div class="form-group relative w-full">
                <input type="password" name="password" id="pass" class="w-full py-3 pl-10 pr-10 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear" placeholder="{{ __('auth.pass-placeholder') }}" required>
                <i class="absolute left-3 top-1/2 transform -translate-y-1/2 bi bi-incognito text-gray-900 dark:text-m-blue"></i>
                <i class="absolute right-3 top-1/2 transform -translate-y-1/2 bi bi-eye-slash text-gray-900 dark:text-gray-400 cursor-pointer" onclick="togglePasswordVisibility('pass', this)"></i>
            </div>
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <div class="flex items-center gap-2 text-gray-600 dark:text-gray-300">
                <input type="checkbox" name="remember" id="remember" class="form-checkbox w-5 h-5 text-m-blue">
                <label for="remember" class="text-sm">{{ __('Zapamätať si ma?') }}</label>
            </div>
            <div class="w-full flex flex-col items-center">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
            </div>
            @error('g-recaptcha-response')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 ease-linear">
                {{ __('auth.login') }}
            </button>
            <div class="flex justify-between items-center w-full text-sm text-gray-400 pr-2 pl-2">
                <x-auth-href :route="'register'" :text="'create-acc'"/>
                <x-auth-href :route="'password.request'" :text="'forgot-password'"/>
            </div>
        </form>
        <div class="flex flex-row space-x-8 pt-8">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'home'" class="right-4" :sclass="'left-14'"/>
        </div>
    </div>
</div>
@endsection