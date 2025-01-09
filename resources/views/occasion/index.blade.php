@extends('structures.main')
@section('title', ''.__('Events').'')
@section('content')
    <div class="p-6">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">Events</h1>
        <div class="container mx-auto flex gap-4">
            <div class="w-1/3 bg-gray-100 p-4 shadow-lg">
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
                            data-days="{{ $days }}"
                            onclick="showDetails(this)">
                            {{ $event->name }}
                        </li>
                    @endforeach
                </ul>
                {{$events->links()}}
            </div>
            <div class="w-2/3 bg-white p-4 shadow-lg">
                <h2 id="eventName" class="text-xl font-bold mb-2">Select an event</h2>
                <p id="eventStart">Click on an event to see details.</p>
                <p id="eventDiff"></p>
                <p id="eventDays"></p>
            </div>
        </div>
    </div>
@endsection