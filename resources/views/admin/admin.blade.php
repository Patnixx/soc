@extends('structures.main')
@section('title', ''.__('title.admin').'')
@section('content')
<div class="h-full flex flex-col items-center justify-center mt-4 md:mt-6 lg:mt-24 px-4 z-0">
    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mb-6 sm:mb-8">Admin Panel</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:w-3/4 sm:h-1/2 md:w-full max-w-6xl px-2 sm:px-4">
        <a href="{{ route('users') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-person-circle text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('admin.users')}}
            </span>
        </a>
        <a href="{{ route('progress') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-book text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('admin.courses')}}
            </span>
        </a>
        <a href="{{ route('materials') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-folder text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('admin.materials')}}
            </span>
        </a>
        <a href="{{ route('events') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-calendar-event text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('admin.calendar')}}
            </span>
        </a>
    </div>
</div>

@endsection