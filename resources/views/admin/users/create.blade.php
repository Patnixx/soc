@extends('structures.main')
@section('title', ''.__('title.users-create').'')
@section('content')
<div class="container mx-auto max-w-[70%] mt-16 rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear">
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">{{__('users.create')}}:</h2>
    <form action="{{route('users.store')}}" method="POST" class="sm:grid sm:grid-cols-2 sm:gap-6 mb-6 flex flex-col gap-4">
        @csrf
        <div class="left">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="f_name" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.f-name')}}</label>
                <x-input-div :name="'f_name'" :type="'text'" :placeholder="'f-name'" :id="'f_name'" :value="''.old('f_name').''" :icon="'bi bi-1-circle-fill'"/> 
                @error('f_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="l_name" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.l-name')}}</label>
                <x-input-div :name="'l_name'" :type="'text'" :placeholder="'l-name'" :id="'l_name'" :value="''.old('l_name').''" :icon="'bi bi-2-circle-fill'"/>
                @error('l_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <div class="flex flex-col sm:flex-row items-center justify-between">
                    <label for="email" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.email')}}</label>
                    <div class="flex items-center justify-end space-x-2">
                        <label for="email_verify" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.checkbox-label')}}</label>
                        <input name="email_verify" type="checkbox" id="email_verify" value="" class="rounded border-gray-300 dark:bg-gray-800 dark:border-gray-700 text-m-blue focus:ring-m-blue">
                    </div>
                </div>
                <div class="form-group relative w-full">
                    <input type="email" name="email" id="email" class="w-full py-3 pl-10 pr-4 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear" placeholder="{{__('auth.email')}}" @error('email') value="{{old('email')}}" @enderror value="{{ old('email')}}" required>
                    <i class="absolute left-3 top-1/2 transform -translate-y-1/2 bi bi-envelope text-gray-900 dark:text-m-blue"></i>
                </div> 
                @error('email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="birthday" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.birth')}}</label>
                <x-input-div :name="'birthday'" :type="'date'" :placeholder="'birth'" :id="'birthday'" :value="''.old('birthday').''" :icon="'bi bi-cake'"/>
                @error('birthday')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="right">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="telephone" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.tel')}}</label>
                <x-input-div :name="'telephone'" :type="'tel'" :placeholder="'tel'" :id="'telephone'" :value="''.old('telephone').''" :icon="'bi bi-telephone'"/>
                @error('telephone')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="role" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.role')}}</label>
                <div class="relative">
                    <select name="role" id="role" class="w-full py-3 pl-10 pr-4 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear" required>
                        <option value="User">{{__('users.user')}}</option>
                        <option value="Student">{{__('users.student')}}</option>
                        <option value="Teacher">{{__('users.teacher')}}</option>
                        <option value="Admin">{{__('users.admin')}}</option>
                    </select>
                    <i class="absolute left-3 top-1/2 transform -translate-y-1/2 bi bi-award text-gray-900 dark:text-m-blue text"></i>
                </div>
                @error('role')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="pass" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.password')}}</label>
                <x-input-div :name="'pass'" :type="'password'" :placeholder="'pass-placeholder'" :id="'pass'" :value="''" :icon="'bi bi-hash'"/>
                @error('pass')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="c_pass" class="text-sm font-medium dark:text-white text-gray-900">{{__('users.c-pass')}}</label>
                <x-input-div :name="'c_pass'" :type="'password'" :placeholder="'c-pass'" :id="'c_pass'" :value="''" :icon="'bi bi-incognito'"/>
                @error('c_pass')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-plus-circle"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('users.create')}}
                </span>
            </button>
            <a href="{{route('users')}}" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('users.back')}}
                </span>
            </a>
        </div>
    </form>
</div>
@endsection