@extends('structures.main')
@section('title', ''.__('materials.create-sub-theme').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6">
    <form action="{{route('childlecture.store', ['syllab' => $syllab, 'parent' => $parent_row->id])}}" method="POST" enctype="multipart/form-data" class="w-full max-w-md sm:max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-4 sm:p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-xl sm:text-2xl font-semibold dark:text-white text-gray-900 text-center">{{__('materials.create-lecture')}}</h2>
        <div class="flex flex-col space-y-2 mb-2">
            <label for="subtheme" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.sub-theme')}}</label>
            <select name="subtheme" id="subtheme" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                <option value="{{$parent_row->id}}">{{$parent_row->title}}</option>
            </select>
        </div>
        
        <div class="flex flex-col space-y-2 mb-2">
            <label for="title" class="text-sm font-medium dark:text-white text-gray-900">{{__('inbox.title')}}</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="{{__('materials.title')}}"
                maxlength="100" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div class="flex flex-col space-y-2 mb-2">
            <label for="content" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.content')}}</label>
            <textarea 
                name="content" 
                id="content" 
                placeholder="{{__('materials.content')}}"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div class="flex flex-col space-y-2 mb-2">
            <label for="file" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.select-image')}}</label>
            <input 
                type="file" 
                name="file" 
                id="file" 
                placeholder="{{__('materials.file')}}"
                maxlength="50" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm bg-white transition-all duration-300 ease-linear focus:ring focus:ring-blue-300">
        </div>

        <button type="submit"
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue  text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('materials.create-sub-theme')}}
        </button>
    </form>

    <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('childlecture.create', $syllab)}}">
        <i class="bi bi-box-arrow-right"></i>
        <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
            {{__('sidebar.back')}}
        </span>
    </a>
</div>
@endsection