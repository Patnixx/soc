@extends('structures.main')
@section('title', 'zamok')
@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen p-6">
        <form 
            action="{{ route('syllab.update',['id' => $section->id]) }}" 
            method="POST" 
            class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
            @csrf
            @method('PATCH')
            
            <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">
                {{ __('materials.edit', ['title' => $section->title]) }}
            </h2>

            <div class="space-y-4">
                @foreach ($syllab as $relation)
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="text-sm font-medium dark:text-white text-gray-900">
                            {{ $relation->course->name }}
                        </span>
                        <label class="flex items-center space-x-2">
                            <input 
                                type="checkbox" 
                                name="courses[{{ $relation->course->id }}]" 
                                value="1" 
                                {{ ($relation->is_locked == 1) ? '' : 'checked' }} 
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="text-sm font-medium dark:text-white text-gray-900">
                                {{ ($relation->is_locked == 1) ? __('Locked') : __('Unlocked') }}
                            </span>
                        </label>
                    </div>
                @endforeach
            </div>

            <button 
                type="submit" 
                class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
                {{ __('syllabs.unlock') }}
            </button>
        </form>

        <a 
            class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" 
            href="{{ route('syllab.dash') }}">
            <i class="bi bi-box-arrow-right"></i>
            <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                {{ __('sidebar.back') }}
            </span>
        </a>
    </div>
@endsection