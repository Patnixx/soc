@extends('structures.main')
@section('title', ''.__('title.progress').'')
@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col md:flex-row gap-8">
            <div class="w-full md:w-1/3 bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 flex flex-col items-center ease-linear transition-all duration-300">
                <div class="w-32 h-32 rounded-full mb-4 overflow-hidden flex items-center justify-center">
                    @if($user->pfp_path == null)
                        <img id="profilePicture" src="{{ asset('assets/pfp/default-pfp.png')}}" alt="" class="w-28 h-28 rounded-full object-cover border-x-2 border-b-2 border-gray-800 dark:border-slate-200">
                    @else
                        <img id="profilePicture" src="{{ asset('assets/pfp/'.$user->pfp_path)}}" alt="" class="w-28 h-28 rounded-full object-cover border-x-2 border-b-2 border-gray-800 dark:border-slate-200">
                    @endif
                </div>

                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                    {{ $user->f_name }} {{ $user->l_name }}
                </h2>

                <h5 class="text-md font-thin text-gray-800 dark:text-gray-200">
                    {{__('stats.'.$user->role)}}
                </h5>

                <div class="mt w-full pt-4 border-t border-gray-200 text-center">
                    <p class="text-gray-600 text-sm dark:text-gray-400">{{__('stats.total')}}</p>
                    <ul class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                        @foreach($stats as $key => $stat)
                            <li class="grid grid-cols-2 py-1 border-b last:border-b-0">
                                <span class="text-md font-medium truncate my-8">{{ __('stats.'.$key) }}</span>
                                <div class="flex flex-row justify-end items-center gap-4">
                                    <span class="text-md font-medium truncate my-8">{{ $stat['value'] }} / {{ $stat['max'] }}</span>
                                    <div class="w-4 h-4 rounded-full mt-1" style="background: linear-gradient(135deg, {{ $stat['color'] }} 0%, #ffffff 10%, {{ $stat['color'] }} 70%, #444 100%);
                                    box-shadow: inset 2px 2px 5px rgba(255, 255, 255, 0.6), inset -2px -2px 5px rgba(0, 0, 0, 0.6), 2px 2px 5px rgba(0, 0, 0, 0.4);"></div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="w-full md:w-2/3 grid gird-cols-1 md:grid-cols-2 gap-8 ease-linear transition-all duration-300">
                @foreach($stats as $key => $stat)
                    <div class="bg-white dark:bg-gray-900 rounded-lg shadow-md p-6 flex flex-col items-center ease-linear transition-all duration-300">
                        @php
                            if($stat['value'] == 0) $percentage = 0;
                            if($stat['max'] > 17) $percentage = $stat['value'];
                            else
                            $percentage = $stat['value'] / $stat['max'] * 100;
                        @endphp
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2 text-center text-ellipsis">{{ __('stats.'.$key) }}</h3>
                        
                        <div class="relative w-32 h-32 mb-4 ease-linear transition-all duration-300">
                            <svg class="w-full h-full" viewBox="0 0 36 36">
                                <circle cx="18" cy="18" r="15.9155" fill="none" stroke="#e5e7eb"  stroke-width="3" />
                                <circle cx="18" cy="18" r="15.9155" fill="none" stroke="{{ $stat['color'] }}" stroke-width="3"
                                    stroke-dasharray="{{ $percentage }} 100" stroke-linecap="round" class="progress-ring__circle" data-value="{{ $percentage }}" />
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-xl font-bold" style="color: {{ $stat['color'] }}">{{ round($percentage) }} @if($stat['max'] <= 20) % @endif</span>
                            </div>
                        </div>

                        <h3 class="text-lg font-semibold mb-2" style="color: {{$stat['color']}}">{{ ucfirst(str_replace('_', ' ', $stat['title'])) }}</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".progress-ring__circle").forEach(circle => {
            let value = circle.getAttribute("data-value");
            circle.style.strokeDasharray = `0 100`;
            setTimeout(() => {
                circle.style.transition = "stroke-dasharray 1.5s ease-in-out";
                circle.style.strokeDasharray = `${value} 100`;
            }, 100);
        });
    });
</script>
@endsection