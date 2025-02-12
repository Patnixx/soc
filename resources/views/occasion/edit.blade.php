@extends('structures.main')
@if($event->type == 'Theory')
    @section('title', ''.__('occasions.edit-theory').'')
@endif
@if($event->type == 'Ride')
    @section('title', ''.__('occasions.edit-ride').'')
@endif
@section('content')
    @if($event->type == 'Theory')
        <div class="flex flex-col items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
            <form action="{{ route('events.update', $event->id) }}" method="post" class="w-full max-w-xl bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
                @csrf
                <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">{{ __('occasions.edit-theory') }}</h2>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.name') }}:</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        required 
                        placeholder="{{$event->name}}"
                        value="{{$event->name}}" 
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="start" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.start') }}:</label>
                    <input 
                        type="datetime-local" 
                        name="start" 
                        id="start"
                        required 
                        placeholder="{{$event->start}}"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="course" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.course') }}:</label>
                    <select required name="course" id="course" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button 
                    type="submit" 
                    class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
                    {{ __('occasions.edit-theory') }}
                </button>
            </form>
            <div class="mt-2 flex justify-center w-full space-x-4">
                <x-icon-div 
                    :route="'events'"
                    :icon="'bi bi-arrow-left'"
                    :text="'back'"
                    :class="'justify-self-start'"
                    :sclass="'right-14'"
                />
                <form method="POST" action="{{ route('events.delete', $event->id) }}">
                    @csrf
                    <button id="editHref" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer">
                        <i class="bi bi-trash"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('occasions.delete-theory')}}
                        </span>
                    </button>
                </form>
            </div>
        </div>
    @endif
    @if($event->type == 'Ride')
        <div class="flex flex-col items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
            <form action="{{ route('events.update', $event->id) }}" method="post" class="w-full max-w-xl bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
                @csrf
                <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">{{ __('occasions.edit-ride') }}</h2>
                <div class="flex flex-col space-y-2">
                    <label for="name" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.name') }}:</label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name"
                        required 
                        placeholder="{{$event->name}}" 
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="start" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.start') }}:</label>
                    <input 
                        type="datetime-local" 
                        name="start" 
                        id="start"
                        required 
                        placeholder="{{$event->start}}"
                        class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                </div>
                <div class="flex flex-col space-y-2">
                    <label for="user" class="text-sm font-medium dark:text-white text-gray-900">{{ __('occasions.student') }}:</label>
                    <select required name="user" id="user" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                        @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->user->f_name}} {{$student->user->l_name}}</option>
                        @endforeach
                    </select>
                </div>
                <button 
                    type="submit" 
                    class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
                    {{ __('occasions.edit-ride') }}
                </button>
            </form>
            <div class="mt-2 flex justify-center w-full space-x-4">
                <x-icon-div 
                    :route="'events'"
                    :icon="'bi bi-arrow-left'"
                    :text="'back'"
                    :class="'justify-self-start'"
                    :sclass="'right-14'"
                />
                <form method="POST" action="{{ route('events.delete', $event->id) }}">
                    @csrf
                    <button id="editHref" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer">
                        <i class="bi bi-trash"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('occasions.delete-ride')}}
                        </span>
                    </button>
                </form>
            </div>
        </div>
    @endif
@endsection