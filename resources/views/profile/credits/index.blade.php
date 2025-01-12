@extends('structures.main')
@section('title', ''.__('title.credits').'')
@section('content')
<div class="w-full h-screen flex flex-col justify-center items-center">
    <div class="w-full h-[80%] rounded-3xl p-8 flex flex-col justify-center items-center bg-white dark:bg-gray-800 shadow-lg">
        <span class="text-gray-800 dark:text-white text-5xl font-serif text-center mb-6">
            {{ __('title.credits') }}
        </span>
        <div id="bubbles" class="w-full sm:w-2/3 md:w-1/3 flex flex-col items-center justify-center gap-4 border-4 border-gray-300 dark:border-gray-700 rounded-xl p-6 bg-gray-50 dark:bg-gray-900">
            <a href="https://www.flaticon.com/free-icons/speeding" target="_blank" title="speeding icons" 
               class="text-gray-800 dark:text-white text-sm hover:underline">
                Speeding icons created by Leremy - Flaticon
            </a>
            <a href="https://storyset.com/transport" target="_blank" 
               class="text-gray-800 dark:text-white text-sm hover:underline">
                Transport illustrations by Storyset
            </a>
            <a href="https://storyset.com/people" target="_blank" 
               class="text-gray-800 dark:text-white text-sm hover:underline">
                People illustrations by Storyset
            </a>
        </div>
    </div>
</div>

@endsection