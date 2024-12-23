@extends('structures.main')
@section('title', ''.__('title.inbox-new').'')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
    <form action="{{route('custom.message', $user->id)}}" method="post" class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        @csrf
        <h2 class="text-2xl font-semibold dark:text-white text-gray-900 text-center">Send a Message</h2>

        <div class="flex flex-col space-y-2">
            <label for="email" class="text-sm font-medium dark:text-white text-gray-900
            ">{{__('inbox.email')}}:</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                placeholder={{__('inbox.email')}} 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="title" class="text-sm font-medium dark:text-white text-gray-900
            ">{{__('inbox.title')}}:</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                placeholder={{__('inbox.title')}} 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>

        <div class="flex flex-col space-y-2">
            <label for="content" class="text-sm font-medium dark:text-white text-gray-900
            ">{{__('inbox.content')}}:</label>
            <textarea 
                name="content" 
                id="content" 
                placeholder={{__('inbox.content')}} 
                class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none"></textarea>
        </div>

        <button 
            type="submit" 
            class="w-full dark:bg-m-blue dark:text-white dark:hover:bg-m-darkblue bg-m-blue  text-gray-900 hover:bg-m-red hover:text-white font-semibold py-2 rounded-lg transition-all duration-300 ease-linear">
            {{__('inbox.send')}}
        </button>
    </form>

    <x-icon-div 
        :route="'inbox'"
        :icon="'bi bi-arrow-left'"
        :text="'msg-back'"
        :class="'justify-self-start'"
        :sclass="'right-14'"
        />
</div>
@endsection
