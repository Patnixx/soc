@extends('structures.main')
@section('title', ''.__('occasions.events-create').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen px-4 sm:px-8">
    <form action="{{ route('events.store.kpp') }}" method="post" class="w-full max-w-lg sm:max-w-xl bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">{{ __('occasions.create-kpp') }}</h2>
        <div class="flex flex-col space-y-2">
            <label for="name" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.name') }}:</label>
            <input 
                type="text" 
                name="name" 
                id="name"
                required 
                placeholder="Name" 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="start" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.start') }}:</label>
            <input 
                type="datetime-local" 
                name="start" 
                id="start"
                required 
                placeholder="Start"
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="course" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.course') }}:</label>
            <select name="course" id="course" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                @endforeach
            </select>
        </div>
        <button 
            type="submit" 
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{ __('occasions.create') }}
        </button>
    </form>
    <div class="mt-2 flex justify-center w-full">
        <x-icon-div 
            :route="'events'"
            :icon="'bi bi-arrow-left'"
            :text="'back'"
            :class="'justify-self-start'"
            :sclass="'right-14'"
        />
    </div>
</div>
@endsection