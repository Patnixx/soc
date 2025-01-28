@extends('structures.main')
@section('title', ''.__('materials.lock-courses').'')
@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen p-6">
        <form 
            action="{{ route('syllab.unlock',['id' => $section->id]) }}" 
            method="POST" 
            class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
            @csrf
            @method('PATCH')
            
            <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">
                {{ __('materials.edit', ['title' => $section->title]) }}
            </h2>

            <div class="space-y-4">
                @foreach ($syllab as $relation)
                    <div class="items-center justify-end border-b pb-2 grid grid-cols-3">
                        <span class="text-sm font-medium dark:text-white text-gray-900">
                            {{ $relation->course->name }}
                        </span>
                        <label class="flex items-center justify-end space-x-2">
                            <input 
                                type="checkbox" 
                                name="courses[{{ $relation->course->id }}]"
                                id="{{$relation->course->id}}" 
                                value="{{$relation->is_locked}}" 
                                {{ ($relation->is_locked == 1) ? 'checked' : '' }} 
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
                            <span class="text-sm font-medium dark:text-white text-gray-900">
                                {{ ($relation->is_locked == 1) ? __('Locked') : __('Unlocked') }}
                            </span>
                        </label>
                        <a class="flex items-center justify-center" href="{{route('syllab.removeCourse', ['courseId' => $relation->id, 'syllabId' => $section->id])}}">
                            <i class="bi bi-trash hover:text-gray-500 text-red-600 dark:hover:text-gray-400 dark:text-red-500"></i>
                        </a>
                    </div>
                @endforeach
                <button 
                type="submit" 
                class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
                {{ __('materials.save-courses') }}
                </button>
            </div>

            
        </form>

        <div class="flex flex-row items-center justify-center mt-4 space-x-2">
            <a 
                class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" 
                href="{{ route('syllab.dash') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{ __('sidebar.back') }}
                </span>
            </a>
            <a 
                class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-m-blue dark:bg-gray-800  text-gray-900 dark:text-m-blue hover:bg-m-red dark:hover:bg-m-darkblue hover:text-white dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" 
                href="{{ route('syllab.assign', ['id' => $section->id]) }}">
                <i class="bi bi-plus-circle"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{ __('sidebar.assign-course') }}
                </span>
            </a>
        </div>
    </div>
@endsection