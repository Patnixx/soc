@extends('structures.main')
@section('title', ''.__('materials.create-sub-theme').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
    <form action="{{route('sublecture.store', $syllab)}}" method="post" class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">{{__('materials.create-sub-theme')}}</h2>

        <div class="flex flex-col space-y-2 mb-2">
            <label for="elder" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.main-theme')}}</label>
            <select name="elder" id="elder" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                @foreach($main_lectures as $main_lecture)
                    <option value="{{$main_lecture->id}}">{{$main_lecture->title}}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col space-y-2">
            <label for="title" class="text-sm font-medium dark:text-white text-gray-900
            ">{{__('materials.create-title')}}:</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder={{__('materials.create-title')}}
                maxlength="50" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="content" class="text-sm font-medium dark:text-white text-gray-900
            ">{{__('materials.create-content')}}:</label>
            <textarea 
                name="content" 
                id="content" 
                placeholder={{__('materials.create-content')}} 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none"></textarea>
        </div>

        <button 
            type="submit" 
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue  text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('materials.create-sub-theme')}}
        </button>
    </form>

    <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('lecture.view', $syllab)}}">
        <i class="bi bi-box-arrow-right"></i>
        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
            {{__('sidebar.back')}}
        </span>
    </a>
</div>
@endsection