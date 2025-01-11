@extends('structures.main')
@section('title', ''.__('occasions.events').'')
@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('occasions.events')}}</h1>
        @if($events->isEmpty())
            <h1 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('occasions.events-empty')}}</h1>
        @endif
        <div class="container mx-auto flex gap-4">
            <div class="w-1/3 bg-white dark:bg-gray-900 p-4 shadow-lg">
                <ul>
                    @foreach($events as $event)
                        @php
                            $date = \Carbon\Carbon::parse($event->start);
                            $now = now();
                            $dayDifference = $date->diffInDays(now());
                            $days = 'days';
                            $class = 'bg-m-blue';
                            if($dayDifference < 7){
                                $class = 'bg-yellow-500';
                            }
                            if($dayDifference < 1){
                                $dayDifference = '<1';
                                $days = 'day';
                                $class = 'bg-m-red';
                            }
                        @endphp
                        <li 
                            class="p-2 hover:bg-gray-200 cursor-pointer {{$class}}" 
                            data-id="{{ $event->id }}"
                            data-name="{{ $event->name }}"
                            data-start="{{ $event->start }}"
                            data-diff="{{ $dayDifference }}"
                            data-days="{{ $event }}"
                            onclick="showDetails(this)">
                            {{ $event->name }}
                        </li>
                    @endforeach
                </ul>
                {{$events->links()}}
            </div>
            <div class="w-2/3 bg-white p-4 shadow-lg">
                <h2 id="eventName" class="text-xl font-bold mb-2">{{__('occasions.select')}}</h2>
                <p id="eventStart">{{__('occasions.select-desc')}}</p>
                <p id="eventDiff"></p>
                <p id="eventDays"></p>
            </div>
        </div>
        <div class="mt-6 flex flex-row justify-end gap-2">
            <x-icon-div 
            :route="'events.create.theory'"
            :icon="'bi bi-plus-circle'"
            :text="'create-event'"
            :class="'justify-self-start'"
            :sclass="'right-14'"
            />
            <x-icon-div 
            :route="'events.create.ride'"
            :icon="'bi bi-arrow-repeat'"
            :text="'create-event'"
            :class="'justify-self-start'"
            :sclass="'left-14'"
            />
        </div>
    </div>
@endsection