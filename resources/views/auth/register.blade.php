@extends('structures.auth')
@section('title', ''.__('title.register').'')
@section('form')
<div class="w-full min-h-screen flex items-center justify-center dark:bg-gray-800 bg-white p-4">
    <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-[0.4fr,0.6fr] items-center justify-center gap-6">
        <!-- Image Section -->
        <div class="hidden md:flex items-center justify-start">
            <img src="{{ asset('assets/img/register.png') }}" alt="Registration Image" class="w-full h-auto object-cover rounded-lg">
        </div>
        <!-- Form Section -->
        <div class="w-full max-w-3xl dark:bg-gray-900 bg-white shadow-lg p-6 sm:p-8 rounded-3xl flex flex-col items-center transition-all duration-300">
            <h2 class="dark:text-m-blue text-gray-900 text-3xl sm:text-4xl font-serif mb-4 sm:mb-6">
                {{ __('auth.register') }}
            </h2>
            <form action="{{ route('custom.register') }}" method="post" class="w-full grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                @csrf
                <div class="flex flex-col space-y-4">
                    <x-input-div :name="'f_name'" :type="'text'" :placeholder="'f-name'" :id="'f_name'" :value="''" :icon="'bi bi-1-circle-fill'"/>
                    @error('f_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <x-input-div :name="'l_name'" :type="'text'" :placeholder="'l-name'" :id="'l_name'" :value="''" :icon="'bi bi-2-circle-fill'"/>
                    @error('l_name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <x-input-div :name="'email'" :type="'email'" :placeholder="'email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <x-input-div :name="'birthday'" :type="'date'" :placeholder="'birth'" :id="'birthday'" :value="''" :icon="'bi bi-cake'" :divclass="'mt-4'"/>
                    @error('birthday')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-4">
                    <x-input-div :name="'telephone'" :type="'tel'" :placeholder="'tel'" :id="'telephone'" :value="''" :icon="'bi bi-telephone'"/>
                    @error('telephone')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <x-input-div :name="'password'" :type="'password'" :placeholder="'pass'" :id="'password'" :value="''" :icon="'bi bi-hash'"/>
                    @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <x-input-div :name="'c_pass'" :type="'password'" :placeholder="'c-pass'" :id="'c_pass'" :value="''" :icon="'bi bi-incognito'"/>
                    @error('c_pass')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                    <div class="relative">                    
                        <span id="strength-text" class="text-sm text-m-blue">Sila hesla</span>
                        <div id="password-strength-bar" class="h-2 mt-2 dark:bg-gray-800 bg-slate-200 rounded-full overflow-hidden">
                            <div id="strength-level" class="h-full rounded-full transition-all" style="width: 0%;"></div>
                        </div>                
                    </div>
                </div>
                <div class="flex justify-between w-full text-sm text-gray-400 mt-4 col-span-1 md:col-span-2">
                    <x-auth-href :route="'login'" :text="'login'"/>
                    <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-2 px-4 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 ease-linear">
                        {{ __('auth.register') }}
                    </button>
                </div>
            </form>
            <div class="flex flex-row space-x-6 sm:space-x-8 pt-6">
                <x-theme-div :spanSide="'right-14'"/>
                <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'home'" class="absolute right-4" :sclass="'left-14'"/>
            </div>
        </div>
    </div>
</div>
@endsection
