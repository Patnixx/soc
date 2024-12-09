@extends('structures.auth')
@section('form')
    <div class="w-144 h-120 dark:bg-gray-900 bg-white transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg p-8 absolute inset-0 m-auto rounded-3xl" id="form-control">
        <h2 class="dark:text-m-blue text-gray-900 text-4xl font-serif mb-6">Register</h2>
        <form action="{{route('custom.register')}}" method="post" class="w-full grid grid-cols-[1fr,1fr] gap-6 relative">
            @csrf
            <div id="personal" class="flex flex-col space-y-6">
                <x-input-div :name="'f_name'" :type="'text'" :placeholder="'First Name'" :id="'f_name'" :value="''" :icon="'bi bi-1-circle-fill'"/>
                <x-input-div :name="'l_name'" :type="'text'" :placeholder="'Last Name'" :id="'l_name'" :value="''" :icon="'bi bi-2-circle-fill'"/>
                <x-input-div :name="'email'" :type="'email'" :placeholder="'Email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
            </div>
            <div id="pass" class="flex flex-col space-y-6">
                <x-input-div :name="'password'" :type="'password'" :placeholder="'Password'" :id="'password'" :value="''" :icon="'bi bi-hash'"/>
                <x-input-div :name="'c_pass'" :type="'password'" :placeholder="'Confirm Password'" :id="'c_pass'" :value="''" :icon="'bi bi-incognito'"/>
                <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 col-span-2">Register</button>
            </div>
            {{--<button type="submit" class="bg-secondary text-white py-3 px-6 rounded-lg font-bold hover:bg-m-blue transition duration-300 col-span-2">Register</button>--}}
            <div class="flex justify-between items-center w-full text-sm text-gray-400 pr-2 pl-2 col-span-2">
                <x-auth-href :route="'login'" :text="'Log In'"/>
            </div>
        </form>
        <div class="flex flex-row space-x-8 pt-8">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-house'" :text="'Home'" :route="'home'" class="absolute bottom-4 right-4"/>
        </div>
    </div>
@endsection