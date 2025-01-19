@extends('structures.main')
@section('title', ''.__('materials.create-sub-theme').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
    <form action="{{route('childlecture.assign', ['syllab' => $syllab, 'parent' => $parent])}}" method="post" class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">decko</h2>
        <div class="flex flex-col space-y-2 mb-2">
            <label for="title" class="text-sm font-medium dark:text-white text-gray-900">titel:</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder="{{__('materials.title')}}"
                maxlength="50" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div class="flex flex-col space-y-2 mb-2">
            <label for="description" class="text-sm font-medium dark:text-white text-gray-900">opis:</label>
            <textarea 
                name="description" 
                id="description" 
                placeholder="{{__('materials.description')}}"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300"></textarea>
        </div>

        <button type="submit"
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue  text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('materials.create-sub-theme')}}
        </button>
    </form>
</div>
@endsection