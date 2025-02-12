@extends('structures.main')
@section('title', ''.__('materials.create-syllab').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
    <form action="{{route('materials.store.syllab')}}" method="post" class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">{{__('materials.create-syllab')}}</h2>
        <div class="flex flex-col space-y-2">
            <label for="title" class="text-sm font-medium dark:text-white text-gray-900">{{__('materials.create-title')}}:</label>
            <input 
                type="text" 
                name="title" 
                id="title"
                required 
                placeholder={{__('materials.create-title')}} 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <button 
            type="submit" 
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('materials.create-syllab')}}
        </button>
    </form>
    <x-icon-div 
        :route="'materials'"
        :icon="'bi bi-arrow-left'"
        :text="'back'"
        :class="'justify-self-start'"
        :sclass="'right-14'"
    />
</div>
@endsection