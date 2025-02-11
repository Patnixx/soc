@extends('structures.auth')
@section('title', ''.__('auth.forgot-password').'')
@section('form')
    <div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6">
        <form action="{{route('password.email')}}" method="POST" class="w-full sm:w-3/4 max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
            @csrf
            <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">
                {{__('auth.forgot-password')}}
            </h2>

            @if(session('status'))
                <div class="text-green-500 text-sm font-semibold text-center">
                    {{ session('status') }}
                </div>
            @endif

            <div class="flex flex-col space-y-2 mb-2">
                <label for="email" class="text-sm font-medium dark:text-white text-gray-900">
                    {{__('auth.email')}}
                </label>
                <input type="email" name="email" id="email" placeholder="Email" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300" required autofocus>
            </div>
        
            <button type="submit" class="w-full bg-m-blue text-gray-900 dark:bg-m-blue dark:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear hover:bg-m-red hover:text-white dark:hover:bg-m-darkblue">
                {{__('auth.send-link')}}
            </button>
        </form>

        <div class="flex flex-row justify-center items-center space-x-4 pt-8">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'back'" :route="'login'" :sclass="'left-14'"/>
        </div>
    </div>
@endsection