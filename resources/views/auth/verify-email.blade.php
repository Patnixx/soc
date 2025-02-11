@extends('structures.auth')
@section('title', ''.__('title.verify-email').'')
@section('form')
<div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6 transition-all duration-300 ease-linear">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md dark:bg-gray-900 transition-all duration-300 ease-linear">
        <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white">{{__('auth.verify-email')}}</h2>
        <p class="mt-4 text-sm text-gray-600 dark:text-gray-300 text-center">{{__('auth.verify-info')}}</p>

        @if (session('message'))
            <div class="mt-4 p-3 text-sm text-green-600 bg-green-100 rounded-md dark:text-green-400 dark:bg-green-900">
                {{ session('message') }}
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}" class="mt-6">
            @csrf
            <button type="submit"class="w-full px-4 py-2 text-gray-900 dark:text-white hover:text-white bg-m-blue rounded-lg hover:bg-m-red dark:bg-m-blue dark:hover:bg-m-darkblue transition-all duration-300 ease-linear">{{__('auth.resend-link')}}</button>
        </form>

        <form method="GET" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit"class="w-full px-4 py-2 text-white bg-m-red rounded-lg hover:bg-m-blue hover:text-gray-900 dark:text-white dark:bg-m-darkblue dark:hover:bg-m-blue transition-all duration-300 ease-linear">{{__('auth.logout')}}</button>
        </form>
    </div>
    <div class="flex flex-row justify-center items-center space-x-4 pt-8">
        <x-theme-div :spanSide="'right-14'"/>
        <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'home'" :sclass="'left-14'"/>
    </div>
</div>
@endsection