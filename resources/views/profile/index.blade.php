@extends('structures.main')
@section('title', ''.__('title.profile').'')
@section('content')
<div class="">
    <!-- Page Content -->
    <main>
        <div class="py-12">
            <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 space-y-6 flex flex-col justify-center items-center">
                
                <!-- Profile Information Section -->
                <div class="w-full md:w-3/4 lg:w-2/3 p-6 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg border-x-2 border-b-2 border-gray-800 dark:border-slate-200 transition-all ease-linear duration-300">
                    <section>
                        <header>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('profile.profile-info') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('profile.profile-info-user') }}
                            </p>
                        </header>

                        <form method="post" action="{{route('profile.update.personal')}}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <div class="flex justify-center mb-6">
                                <img src="{{ auth()->user()->profile_picture_url ?? asset('images/default-avatar.png') }}" alt="Profile Picture" class="w-28 h-28 rounded-full object-cover border-x-2 border-b-2 border-gray-800 dark:border-slate-200">
                            </div>

                            <div class="flex flex-col md:grid grid-col-1 md:grid-cols-2 md:grid-rows-3 gap-4">
                                <div>
                                    <label for="f_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.f-name') }}</label>
                                    <input type="text" id="f_name" name="f_name" value="{{ auth()->user()->f_name }}" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-3/4 h-8 pl-2 transition-all ease-linear duration-300" required autofocus>
                                </div>
    
                                <div>
                                    <label for="l_name" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.l-name') }}</label>
                                    <input type="text" id="l_name" name="l_name" value="{{ auth()->user()->l_name }}" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-3/4 h-8 pl-2 transition-all ease-linear duration-300" required autofocus>
                                </div>
    
                                <div>
                                    <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.email') }}</label>
                                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-3/4 h-8 pl-2 transition-all ease-linear duration-300" required>
                                </div>

                                <div>
                                    <label for="birthday" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.birth') }}</label>
                                    <input type="date" id="birthday" name="birthday" value="{{ auth()->user()->birthday }}" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-3/4 h-8 pl-2 transition-all ease-linear duration-300" required>
                                </div>

                                <div>
                                    <label for="phone" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.tel') }}</label>
                                    <input type="tel" id="phone" name="phone" value="{{ auth()->user()->tel_number }}" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-3/4 h-8 pl-2 transition-all ease-linear duration-300" required>
                            </div>
                            <div class="flex items-center gap-4">
                                <button type="submit" class="px-4 py-2 bg-m-blue text-gray-900 hover:bg-m-red hover:text-white dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue dark:hover:text-white rounded-md transition-all ease-linear duration-300">
                                    {{ __('profile.save') }}
                                </button>
                            </div>
                        </form>
                    </section>
                </div>

                <!-- Password Update Section -->
                <div class="w-full md:w-3/4 lg:w-2/3 p-6 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg border-x-2 border-b-2 border-gray-800 dark:border-slate-200 transition-all ease-linear duration-300">
                    <section>
                        <header>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('profile.update-pass') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('profile.update-pass-info') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.update.password') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <label for="current_password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.old-pass') }}</label>
                                <input type="password" id="current_password" name="current_password" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-1/2 h-8 pl-2  transition-all ease-linear duration-300" required autofocus>
                            </div>

                            <div>
                                <label for="password" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.n-pass') }}</label>
                                <input type="password" id="password" name="password" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-1/2 h-8 pl-2  transition-all ease-linear duration-300" required autofocus>
                            </div>

                            <div>
                                <label for="cpass" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('profile.c-pass') }}</label>
                                <input type="password" id="cpass" name="cpass" class="border-gray-300 dark:border-gray-700 bg-slate-200 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-1/2 h-8 pl-2  transition-all ease-linear duration-300" required autofocus>
                            </div>
                            <div class="relative">                    
                                <span id="strength-text" class="text-sm text-m-blue">Sila hesla</span>
                                <div id="password-strength-bar" class="h-2 mt-4.75 dark:bg-gray-900 bg-slate-200 rounded-full overflow-hidden w-1/2">
                                    <div id="strength-level" class="h-full rounded-full transition-all" style="width: 0%;"></div>
                                </div>                
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit" class="px-4 py-2 bg-m-blue text-gray-900 hover:bg-m-red hover:text-white dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue dark:hover:text-white rounded-md transition-all ease-linear duration-300">
                                    {{ __('profile.save') }}
                                </button>
                            </div>
                        </form>
                    </section>
                </div>

                <!-- Change Language Section -->
                <div class="w-full md:w-3/4 lg:w-2/3 p-6 sm:p-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg border-x-2 border-b-2 border-gray-800 dark:border-slate-200 duration-300 ease-linear transition-all">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('profile.language') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('profile.lang-info') }}
                            </p>
                        </header>

                        <x-language-popup />
                        <button type="button" class="px-4 py-2 bg-m-blue text-gray-900 hover:bg-m-red hover:text-white dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue dark:hover:text-white rounded-md transition-all ease-linear duration-300" onclick="showPopup()">
                            {{ __('profile.lang-change') }}
                        </button>
                    </section>
                </div>

                <!-- Delete Account Section -->
                <div class="w-full md:w-3/4 lg:w-2/3 p-6 sm:p-8 bg-white dark:bg-gray-800 shadow rounded-lg border-x-2 border-b-2 border-gray-800 dark:border-slate-200 transition-all ease-linear duration-300">
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ __('profile.delete-account') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('profile.delete-account-info') }}
                            </p>
                        </header>
                
                        <x-delete-acc-modal />
                        <button type="button" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-500 transition-all ease-linear duration-300" onclick="showModal()">
                            {{ __('profile.delete-account-btn') }}
                        </button>
                    </section>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection