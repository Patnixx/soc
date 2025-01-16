@extends('structures.main')
@section('title', ''.__('occasions.events').'')
@section('content')
<div class="mt-12 p-6 bg-gray-100 dark:bg-gray-800 rounded-lg shadow-md transition-all duration-300 ease-linear">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{ __('occasions.events') }}</h1>
    
    @if ($events->isEmpty())
        <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{ __('occasions.events-empty') }}</h1>
    @endif
    
    <div class="container mx-auto flex flex-col md:flex-row gap-4">
        <!-- Event List Section -->
        <div class="w-full md:w-1/3 bg-white dark:bg-gray-900 p-4 shadow-lg rounded-lg space-y-4 transition-all duration-300 ease-linear">
            <ul class="space-y-2">
                @foreach($events as $event)
                    @php
                        $date = \Carbon\Carbon::parse($event->start);
                        $now = now();
                        $dayDifference = $date->diffInDays(now());
                        $days = 'days';
                        $class = 'bg-m-blue';
                        if($dayDifference < 7){
                            $class = 'bg-m-purple';
                        }
                        if($dayDifference < 1){
                            $dayDifference = '<1';
                            $days = 'day';
                            $class = 'bg-m-red';
                        }
                    @endphp
                    <li 
                        class="p-4 hover:bg-gray-200 dark:hover:bg-gray-800 cursor-pointer {{$class}} rounded-lg transition-all duration-300 ease-linear transform hover:scale-105 group"
                        data-id="{{ $event->id }}"
                        data-name="{{ $event->name }}"
                        data-start="{{ $event->start }}"
                        data-diff="{{ $dayDifference }}"
                        data-course-name="{{ $event->course->name }}"
                        data-course-class="{{ $event->course->class }}"
                        data-course-length="{{ $event->course->length }}"
                        data-course-season="{{ $event->course->season }}"
                        onclick="showDetails(this)">
                        <h3 class="text-lg font-semibold text-gray-200 transition-all duration-300 ease-linear group-hover:text-gray-800 dark:group-hover:text-gray-200">{{ $event->name }}</h3>
                        <p class="text-sm text-gray-400 transition-all duration-300 ease-linear group-hover:text-gray-800 dark:group-hover:text-gray-200">{{ __('occasions.date') }}: {{ $event->start }}</p>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
                {{$events->links()}}
            </div>
        </div>

        <!-- Event Details Section -->
        @if($events->isEmpty())
            
        @else
        <div class="w-full md:w-2/3 bg-white dark:bg-gray-900 p-4 shadow-lg rounded-lg space-y-4 transition-all duration-300 ease-linear grid grid-cols-[0.9fr,0.1fr]" id="eventDetails">
            <div class="">
                <h1 id="eventName" class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">{{ __('occasions.select') }}</h1>
                <div class="flex flex-col">
                    <h2 id="eventStartID" class="text-gray-900 dark:text-gray-400 hidden font-bold">{{__('occasions.date')}}:</h2>
                    <h2 id="eventStart" class="text-gray-900 dark:text-gray-400">{{ __('occasions.select-desc') }}</h2>    
                </div>
                <div class="flex flex-col">
                    <h2 id="eventDiffID" class="text-gray-900 dark:text-gray-400 hidden font-bold">{{__('occasions.days-left')}}:</h2>
                    <h2 id="eventDiff" class="text-gray-900 dark:text-gray-400"></h2>
                </div>
                <div class="flex flex-col">
                    <h2 id="eventCourseNameID" class="text-gray-900 dark:text-gray-400 hidden font-bold">{{__('occasions.name')}}:</h2>
                    <h2 id="eventCourseName" class="text-gray-900 dark:text-gray-400"></h2>
                </div>
                <div class="flex flex-col">
                    <h2 id="eventCourseClassID" class="text-gray-900 dark:text-gray-400 hidden font-bold">{{__('occasions.class')}}:</h2>
                    <h2 id="eventCourseClass" class="text-gray-900 dark:text-gray-400"></h2>
                </div>
                <div class="flex flex-col">
                    <h2 id="eventCourseLengthID" class="text-gray-900 dark:text-gray-400 hidden font-bold">{{__('occasions.length')}}:</h2>
                    <h2 id="eventCourseLength" class="text-gray-900 dark:text-gray-400"></h2>
                </div>
                <div class="flex flex-col">
                    <h2 id="eventCourseSeasonID" class="text-gray-900 dark:text-gray-400 hidden font-bold">{{__('occasions.season')}}:</h2>
                    <h2 id="eventCourseSeason" class="text-gray-900 dark:text-gray-400"></h2>
                </div>
            </div>
            @if($user->role == 'Teacher' || $user->role == 'Admin')
                <div id="btns" class="flex-col justify-end hidden">
                    <a id="editHref" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-yellow-500 hover:bg-yellow-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('events.edit', $event->id)}}">
                        <i class="bi bi-pencil"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('occasions.edit')}}
                        </span>
                    </a>
                </div>
            @endif
        </div>
    </div>
    @endif

    @if($user->role == 'Teacher' || $user->role == 'Admin')
        <div class="mt-6 flex flex-col md:flex-row justify-end gap-2">
            <x-icon-div 
                :route="'events.create.theory'"
                :icon="'bi bi-plus-circle'"
                :text="'create-theory'"
                :class="'justify-self-start'"
                :sclass="'right-14'"
            />
            <x-icon-div 
                :route="'events.create.ride'"
                :icon="'bi bi-arrow-repeat'"
                :text="'create-ride'"
                :class="'justify-self-start'"
                :sclass="'left-14'"
                class="hover:bg-blue-500 hover:text-white p-2 rounded-full transition-all duration-300 ease-linear"
            />
        </div>
    @endif
</div>


@endsection