@extends('structures.auth')
@section('title', ''.__('title.register').'')
@section('form')
    <div class="w-full min-h-screen grid grid-cols-[0.4fr,0.5fr] items-center justify-center dark:bg-gray-900 bg-white">
        <div class="w-full h-full flex items-center justify-start">
            <img src="{{asset('assets/img/register.png')}}" alt="Registration Image" class="w-3/4">
        </div>
        <div class="w-full  max-w-4xl dark:bg-gray-900 bg-white transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg p-8 mx-auto my-auto rounded-3xl">
            <h2 class="dark:text-m-blue text-gray-900 text-4xl font-serif mb-6">{{__('auth.register')}}</h2>
            <form action="{{route('custom.register')}}" method="post" class="w-full grid grid-cols-1 md:grid-cols-2 gap-6 relative">
                @csrf
                <div id="left" class="flex flex-col space-y-6">
                    <x-input-div :name="'f_name'" :type="'text'" :placeholder="'f-name'" :id="'f_name'" :value="''" :icon="'bi bi-1-circle-fill'"/>
                    <x-input-div :name="'l_name'" :type="'text'" :placeholder="'l-name'" :id="'l_name'" :value="''" :icon="'bi bi-2-circle-fill'"/>
                    <x-input-div :name="'email'" :type="'email'" :placeholder="'email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
                    <x-input-div :name="'birthday'" :type="'date'" :placeholder="'birth'" :id="'birthday'" :value="''" :icon="'bi bi-cake'" :divclass="'mt-4'"/>
                    <div class="flex justify-start items-start w-full text-sm text-gray-400 p-2 pt-4">
                        <x-auth-href :route="'login'" :text="'login'"/>
                    </div>
                </div>
                <div id="right" class="flex flex-col space-y-6">
                    <x-input-div :name="'telephone'" :type="'tel'" :placeholder="'tel'" :id="'telephone'" :value="''" :icon="'bi bi-telephone'"/>
                    <x-input-div :name="'password'" :type="'password'" :placeholder="'pass'" :id="'password'" :value="''" :icon="'bi bi-hash'"/>
                    <x-input-div :name="'c_pass'" :type="'password'" :placeholder="'c-pass'" :id="'c_pass'" :value="''" :icon="'bi bi-incognito'">
                    </x-input-div>
                    <div class="relative">                    
                        <span id="strength-text" class="text-sm text-m-blue">Sila hesla</span>
                        <div id="password-strength-bar" class="h-2 mt-4.75 dark:bg-gray-900 bg-slate-200 rounded-full overflow-hidden">
                            <div id="strength-level" class="h-full rounded-full transition-all" style="width: 0%;"></div>
                        </div>                
                    </div>
                    <div class="flex justify-end items-end w-full text-sm text-gray-400 p-2 pt-4 mt-4">
                        <button type="submit" class="dark:text-gray-400 dark:hover:text-m-blue text-m-blue hover:text-gray-900 transition duration-300">{{__('auth.register')}}</button>
                    </div>
                </div>
            </form>
            
            <div class="flex flex-row space-x-8 pt-8">
                <x-theme-div :spanSide="'right-14'"/>
                <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'home'" class="absolute right-4" :sclass="'left-14'"/>
            </div>
        </div>
    </div>
@endsection
