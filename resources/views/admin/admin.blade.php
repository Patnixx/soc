@extends('structures.main')
@section('title', ''.__('title.admin').'')
@section('content')
<div class="h-full flex flex-col items-center justify-center mt-38">
    <h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-8">Admin Panel</h1>
    <div class="flex flex-row gap-8 w-full max-w-5xl px-4 justify-center">
        <a href="{{ route('users') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-64 h-64 group">
            <i class="bi bi-person-circle text-6xl mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">Users</span>
        </a>
        <a href="{{ route('progress') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-64 h-64 group">
            <i class="bi bi-book text-6xl mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">Courses</span>
        </a>
        <a href="{{ route('home') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-64 h-64 group">
            <i class="bi bi-folder text-6xl mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">Material</span>
        </a>
        <a href="{{ route('events') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-64 h-64 group">
            <i class="bi bi-calendar-event text-6xl mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">Calendar</span>
        </a>
    </div>
</div>
@endsection