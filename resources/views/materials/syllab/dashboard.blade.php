@extends('structures.main')
@section('title', ''.__('materials.syllab-dash').'')
@section('content')
<div class="p-6 m-12">
    <div class="flex flex-row justify-between">
        <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-start">{{__('materials.syllab-dash')}}</h1>            
    </div>
    <div class="flex flex-col divide-y divide-gray-300 dark:divide-gray-800 bg-white dark:bg-gray-900 rounded-lg shadow-md transition-all duration-300 ease-linear">
        <a class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 w-full h-auto px-4 py-2 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all bg-gradient-to-br from-transparent via-transparent">
            <div class="flex items-center truncate">
                <span class="text-sm truncate font-medium text-gray-900 dark:text-white">#</span>
            </div>
            <div class="flex items-center text-sm truncate">
                <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('materials.syllab-name')}}</span>
            </div>
            <div class="flex items-center justify-end text-sm truncate space-x-4"></div>
        </a>                
        @foreach ($syllabs as $syllab)
            <x-syllab-dash-div 
            :id="$syllab->id"
            :title="''.$syllab->title.''"
            :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
            :iclass="'cursor-pointer'"
            :aclass="''"
            :user="$user"
            />
        @endforeach
    </div>
    <div class="flex justify-between">
        <div class="mt-6 flex flex-row justify-end">
            <x-icon-div 
            :route="'materials'"
            :icon="'bi bi-arrow-left-circle'"
            :text="'back'"
            :class="'justify-self-start'"
            :sclass="'right-14'"
            />
        </div>
        <div class="mt-6 flex flex-row justify-end">
            <x-icon-div 
            :route="'materials.create.syllab'"
            :icon="'bi bi-plus-circle'"
            :text="'create-syllab'"
            :class="'justify-self-start'"
            :sclass="'right-14'"
            />
        </div>
    </div>
    <br>
    {{$syllabs->links()}}
</div>
@endsection