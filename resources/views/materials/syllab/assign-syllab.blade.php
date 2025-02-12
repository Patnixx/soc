@extends('structures.main')
@section('title', ''.__('materials.assign-sub-theme').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
    <form action="{{route('syllab.addCourse', $id)}}" method="post" class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">{{__('materials.assign-sub-theme')}}</h2>
        <div class="flex flex-col space-y-2 mb-2">
            <label for="course_id" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.main-theme')}}</label>
            <select name="course_id" id="course_id" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}} -> ({{$course->teacher->f_name}} {{$course->teacher->l_name}})</option>
                @endforeach
            </select>
        </div>
        <button 
            type="submit" 
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('materials.assign-sub-theme')}}
        </button>
    </form>
    <a class="relative flex items-center justify-center h-12 w-12 mt-4 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('syllab.dash')}}">
        <i class="bi bi-box-arrow-right"></i>
        <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
            {{__('sidebar.back')}}
        </span>
    </a>
</div>
@endsection