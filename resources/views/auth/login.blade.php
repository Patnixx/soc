@extends('structures.auth')
@section('form')
    <div class="w-112 h-144 bg-gray-900 flex flex-col items-center justify-center shadow-lg p-8 absolute inset-0 m-auto rounded-3xl" id="form-control">
        <h2 class="text-m-blue text-4xl font-serif mb-6">Log In</h2>
        <form action="{{ route('custom.login')}}" method="post" class="w-full flex flex-col gap-6 relative">
            @csrf
            <x-input-div :name="'email'" :type="'email'" :placeholder="'Email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
            <x-input-div :name="'password'" :type="'password'" :placeholder="'Password'" :id="'password'" :value="''" :icon="'bi bi-incognito'"/>
            <button type="submit" class="bg-secondary text-white py-3 px-6 rounded-lg font-bold hover:bg-m-blue transition duration-300">Log In</button>
            <div class="flex justify-between items-center w-full text-sm text-gray-400 pr-2 pl-2">
                <x-auth-href :route="'register'" :text="'Create an account'"/>
                <x-auth-href :route="'#'" :text="'Forgot password?'"/>
            </div>
        </form>
        <x-icon-div :icon="'bi bi-house'" :text="''" :route="'home'" class="absolute bottom-4 right-4"/>
    </div>
@endsection