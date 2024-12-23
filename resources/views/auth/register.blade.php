@extends('structures.auth')
@section('title', ''.__('title.register').'')
@section('form')
    <div class="w-144 h-120 dark:bg-gray-900 bg-white transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg p-8 absolute inset-0 m-auto rounded-3xl" id="form-control">
        <h2 class="dark:text-m-blue text-gray-900 text-4xl font-serif mb-6">{{__('auth.register')}}</h2>
        <form action="{{route('custom.register')}}" method="post" class="w-full grid grid-cols-[1fr,1fr] gap-6 relative">
            @csrf
            <div id="left" class="flex flex-col space-y-6">
                <x-input-div :name="'f_name'" :type="'text'" :placeholder="'f-name'" :id="'f_name'" :value="''" :icon="'bi bi-1-circle-fill'"/>
                <x-input-div :name="'l_name'" :type="'text'" :placeholder="'l-name'" :id="'l_name'" :value="''" :icon="'bi bi-2-circle-fill'"/>
                <x-input-div :name="'email'" :type="'email'" :placeholder="'email'" :id="'email'" :value="''" :icon="'bi bi-envelope'"/>
                <x-input-div :name="'birthday'" :type="'date'" :placeholder="'birth'" :id="'birthday'" :value="''" :icon="'bi bi-cake'" onfocus="(this.type='date')" onblur="(this.type='text')"/>
            </div>
            <div id="left" class="flex flex-col space-y-6">
                <x-input-div :name="'telephone'" :type="'tel'" :placeholder="'tel'" :id="'telephone'" :value="''" :icon="'bi bi-telephone'"/>
                <x-input-div :name="'password'" :type="'password'" :placeholder="'pass'" :id="'password'" :value="''" :icon="'bi bi-hash'"/>
                <x-input-div :name="'c_pass'" :type="'password'" :placeholder="'c-pass'" :id="'c_pass'" :value="''" :icon="'bi bi-incognito'"/>
                <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 col-span-2">{{__('auth.register')}}</button>
            </div>
        </form>
        <div class="flex justify-between items-center w-full text-sm text-gray-400 p-2 pt-4 col-span-2">
            <x-auth-href :route="'login'" :text="'login'"/>
        </div>
        <div class="flex flex-row space-x-8 pt-8 pl-4">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'home'" class="absolute right-4" :sclass="'left-14'"/>
        </div>
    </div>
@endsection