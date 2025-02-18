@extends('structures.auth')
@section('title', ''.__('title.credits').'')
@section('form')
<div class="flex items-center justify-center min-h-screen">
    <div class="w-full max-w-sm sm:w-112 h-auto sm:h-144 bg-white dark:bg-gray-900 transition-all duration-300 ease-linear flex flex-col items-center justify-center shadow-lg px-6 py-8 sm:p-8 rounded-3xl">
        <h2 class="text-m-blue text-4xl font-serif mb-6">{{__('home.credits')}}</h2>
        <ul class="mt-4 pb-4 list-disc pl-5 space-y-2 text-gray-700 dark:text-gray-300 text-sm sm:text-base border-b-2 border-white flex flex-col items-center">
            <li>Framework: Laravel</li>
            <li>{{__('home.styling')}}: Tailwind CSS</li>
            <li>{{__('home.icons')}}: Bootstrap Icons</li>
            <li>{{__('home.hosting')}}: <a href="https://www.websupport.sk/" target="_blank" class="text-m-blue hover:underline">https://www.websupport.sk/</a></li>
            <li>{{__('home.developed-by')}}: <a href="https://github.com/Patnixx" target="_blank" class="text-m-blue hover:underline">Patrik Nemčok</a></li>
        </ul>
        <ul class="mt-4 pb-4 list-disc pl-5 space-y-2 text-gray-700 dark:text-gray-300 text-sm sm:text-base border-b-2 border-white flex flex-col items-center">
            <li><a href="https://www.flaticon.com/free-icons/speeding" target="_blank" title="speeding icons" class="text-m-blue hover:underline">Speeding icons created by Leremy - Flaticon</a></li>
            <li><a href="https://storyset.com/transport" target="_blank" title="transport illustrations" class="text-m-blue hover:underline">Transport illustrations by Storyset</a></li>
            <li><a href="https://storyset.com/people" target="_blank" title="people illustrations" class="text-m-blue hover:underline">People illustrations by Storyset</a></li>
            <li><a href="https://storyset.com/car" target="_blank" title="car illustrations" class="text-m-blue hover:underline">Car illustrations by Storyset</a></li>
            <li><a href="https://storyset.com/web" target="_blank" title="web illustrations" class="text-m-blue hover:underline">Web illustrations by Storyset</a></li>
            <li><a href="https://storyset.com/internet" target="_blank" title="internet illustrations" class="text-m-blue hover:underline">Internet illustrations by Storyset</a></li>
            <li><a href="https://storyset.com/work" target="_blank" title="internet illustrations" class="text-m-blue hover:underline">Work illustrations by Storyset</a></li>
            <li><a href="https://storyset.com/worker" target="_blank" title="internet illustrations" class="text-m-blue hover:underline">Worker illustrations by Storyset</a></li>
        </ul>
        <div class="flex flex-row space-x-8 pt-8">
            <x-theme-div :spanSide="'right-14'"/>
            <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'home'" class="right-4" :sclass="'left-14'"/>
        </div>
    </div>
</div>
@endsection
