@extends('structures.main')
@section('title', ''.__('materials.edit', ['title' => $lecture->title]).'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-4 sm:p-6">
    <form action="{{route('lecture.update', ['id' => $lecture->id, 'syllab' => $syllab])}}" method="post" enctype="multipart/form-data" class="w-full max-w-md sm:max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-4 sm:p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-lg sm:text-2xl font-semibold dark:text-white text-gray-900 text-center">
            {{__('materials.edit', ['title' => $lecture->title])}}
        </h2>
        @if($lecture->syllab_id && $lecture->elder_id == null && $lecture->parent_id == null)
            <div class="flex flex-col space-y-2">
                <label for="sylab" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.syllab')}}:</label>
                <select name="sylab" id="sylab" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    @foreach($all_syllabs as $single_syllab)
                        <option value="{{$single_syllab->id}}">{{$single_syllab->title}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if($lecture->elder_id && $lecture->syllab_id && $lecture->parent_id == null)
            <div class="flex flex-col space-y-2">
                <label for="elder" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.main-theme')}}</label>
                <select name="elder" id="elder" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    @foreach($main_lectures as $main_lecture)
                        <option value="{{$main_lecture->id}}">{{$main_lecture->title}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if($lecture->elder_id && $lecture->parent_id && $lecture->syllab_id)
            <div class="flex flex-col space-y-2">
                <label for="parent" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.sub-theme')}}</label>
                <select name="parent" id="parent" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    @foreach($sub_lectures as $sub_lecture)
                        <option value="{{$sub_lecture->id}}">{{$sub_lecture->title}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="flex flex-col space-y-2">
            <label for="title" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.create-title')}}:</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="{{$lecture->title}}"
                value="{{$lecture->title}}"
                maxlength="50" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="content" class="text-sm font-medium dark:text-white text-gray-900">{{__('inbox.content')}}:</label>
            <textarea 
                name="content" 
                id="content" 
                placeholder="{{$lecture->content}}" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">{{$lecture->content}}</textarea>
        </div>

        @if($lecture->elder_id && $lecture->parent_id)
            <div class="flex flex-col space-y-2 items-center">
                <label for="image" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.image')}}</label>
                <img id="image" 
                    src="{{asset('assets/'.$syllab.'/'.$lecture->img_name.'.jpg')}}" 
                    alt="{{$lecture->img_name}}" 
                    class="h-auto max-w-xs sm:max-w-sm object-cover rounded-lg">
            </div>

            <div class="flex flex-col space-y-2">
                <label for="file" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.select-image')}}</label>
                <input 
                    type="file" 
                    name="file" 
                    id="file" 
                    class="w-full px-4 py-2 border rounded-lg bg-white shadow-sm focus:ring focus:ring-blue-300">
            </div>
        @endif

        <button 
            type="submit" 
            class="w-full sm:py-3 dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('materials.update')}}
        </button>
    </form>

    <a class="relative flex items-center justify-center h-10 w-10 sm:h-12 sm:w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-full sm:rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" 
        href="{{route('lecture.view', $syllab)}}">
        <i class="bi bi-box-arrow-right"></i>
        <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
            {{__('sidebar.back')}}
        </span>
    </a>
</div>
@endsection