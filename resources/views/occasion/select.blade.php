@extends('structures.main')
@section('title', ''.__('occasions.events-select').'')
@section('content')
<div class="mt-12 p-6 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md transition-all duration-300 ease-linear">
    <h1 class="text-3xl sm:text-4xl font-bold text-gray-800 dark:text-white mb-6 sm:mb-8">{{__('occasions.select')}}</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <a href="{{ route('events.create.theory') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-book text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('occasions.theory')}}
            </span>
        </a>
        <a href="{{ route('events.create.vp') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-display text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('occasions.vp')}}
            </span>
        </a>
        <a href="{{ route('events.create.ride') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-car-front-fill text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('occasions.ride')}}
            </span>
        </a>
        <a href="{{ route('events.create.kpp') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-bandaid-fill text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('occasions.kpp')}}
            </span>
        </a>
        <a href="{{ route('events.create.exam') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-full h-52 sm:h-64 group">
            <i class="bi bi-clipboard2-check-fill text-5xl sm:text-6xl mb-3 sm:mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
            <span class="text-base sm:text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">
                {{__('occasions.exam')}}
            </span>
        </a>
    </div>
</div>
@endsection