@extends('structures.auth')
@section('form')
    <div class="w-112 h-144 bg-white dark:bg-gray-900 transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg p-8 absolute inset-0 m-auto rounded-3xl" id="form-control">
        <h2 class="text-m-blue text-4xl font-serif mb-6">Log In</h2>
        <form action="{{ route('custom.login')}}" method="post" class="w-full flex flex-col gap-6 relative">
            @csrf
            <x-input-div :name="'email'" :type="'email'" :placeholder="'Email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
            <x-input-div :name="'password'" :type="'password'" :placeholder="'Password'" :id="'pass'" :value="''" :icon="'bi bi-incognito'"/>
            <x-show-pass-input :name="'show_pass'" :id="'show_pass'" />
            <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300">Log In</button>
            <div class="flex justify-between items-center w-full text-sm text-gray-400 pr-2 pl-2">
                <x-auth-href :route="'register'" :text="'Create an account'"/>
                <x-auth-href :route="'/'" :text="'Forgot password?'"/>
            </div>
        </form>
        <div class="flex flex-row space-x-8 pt-8 pl-4">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-house'" :text="'Home'" :route="'home'" class="absolute right-4" :sclass="'left-14'"/>
        </div>
    </div>
@endsection