@extends('structures.main')
@section('title', ''.__('title.course-create').'')
@section('content')
<div class="flex justify-center items-center min-h-screen px-4">
    <div class="w-full max-w-4xl rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 transition-all duration-300 ease-linear"> 
        <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6 text-center">{{__('courses.course-create')}}:</h2>
        <form method="POST" action="{{route('custom.course')}}" class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @csrf
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col">
                    <label for="name" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.name')}}</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        required
                        placeholder={{__('courses.name')}} 
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                </div>
                <div class="flex flex-col">
                    <label for="teacher" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.teacher')}}</label>
                    <select name="teacher" id="teacher" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 @if($teachers->isEmpty()) disabled @endif">
                        @foreach ($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->f_name}} {{$teacher->l_name}} -> {{$teacher->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="desc" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.description')}}</label>
                    <textarea 
                        name="desc" 
                        id="desc"
                        required
                        placeholder={{__('courses.description')}}  
                        class="w-full h-28 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none"></textarea>
                </div>
            </div>
            <div class="flex flex-col space-y-4">
                <div class="flex flex-col">
                    <label for="class" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.class')}}</label>
                    <select name="class" id="class" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="length" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.length')}}</label>
                    <select name="length" id="length" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        <option value="Classic">{{__('courses.classic')}}</option>
                        <option value="Turbo">{{__('courses.turbo')}}</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="status" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.status')}}</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        <option value="Open">{{__('courses.open')}}</option>
                        <option value="Active">{{__('courses.active')}}</option>
                        <option value="Finished">{{__('courses.finished')}}</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="season" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.season')}}</label>
                    <select name="season" id="season" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        <option value="Spring">{{__('courses.spring')}}</option>
                        <option value="Summer">{{__('courses.summer')}}</option>
                        <option value="Autumn">{{__('courses.autumn')}}</option>
                        <option value="Winter">{{__('courses.winter')}}</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center items-center space-x-4 col-span-1 md:col-span-2">
                <button type="submit" class="relative flex items-center justify-center h-12 w-12 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                    <i class="bi bi-plus-circle text-lg"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.create')}}
                    </span>
                </button>
                <a href="{{route('progress')}}" class="relative flex items-center justify-center h-12 w-12 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                    <i class="bi bi-box-arrow-right text-lg"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.back')}}
                    </span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
