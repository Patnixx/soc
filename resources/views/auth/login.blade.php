@extends('structures.auth')
@section('title', ''.__('title.login').'')
@section('form')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm sm:w-112 h-auto sm:h-144 bg-white dark:bg-gray-900 transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg px-6 py-8 sm:p-8 rounded-3xl">
        <h2 class="text-m-blue text-4xl font-serif mb-6">{{__('auth.login')}}</h2>
        <form action="{{ route('custom.login')}}" method="post" class="w-full flex flex-col gap-6">
            @csrf
            <x-input-div :name="'email'" :type="'email'" :placeholder="'email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <x-input-div :name="'password'" :type="'password'" :placeholder="'pass'" :id="'pass'" :value="''" :icon="'bi bi-incognito'"/>
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
            <x-show-pass-input :name="'show_pass'" :id="'show_pass'" />
            <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300">Log In</button>
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