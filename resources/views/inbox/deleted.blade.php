@extends('structures.main')
@section('title', ''.__('title.inbox-deleted').'')
@section('content')
<div class="p-6 mt-12">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('inbox.bin')}}</h1>
    @if($messages->isEmpty())
        <h2 class="text-lg text-gray-600 dark:text-gray-400 transition-all duration-300 ease-linear">{{__('inbox.empty')}}</h2>
    @else
        <div id="mails" class="flex flex-col divide-y divide-gray-300 dark:divide-gray-700 bg-white dark:bg-gray-900 rounded-lg shadow-md transition-all duration-300 ease-linear">
            @foreach ($messages as $message)
                <x-mail-div 
                    :sender="$message->sender->email" 
                    :title="$message->title" 
                    :content="$message->content" 
                    :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                    :date="Str::afterLast($message->created_at, ' ')" 
                    :id="$message->id"
                    :route="'message.restore'"
                    :iclass="'bi bi-arrow-clockwise text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500'"   
                />
            @endforeach
        </div>
    @endif
    <div class="mt-6 flex flex-row justify-end">
        <x-icon-div 
        :route="'inbox'"
        :icon="'bi bi-arrow-left'"
        :text="'msg-back'"
        :class="'justify-self-start'"
        :sclass="'right-14'"
        />
        <div class="w-4"></div>
        <form action="{{route('clear.bin')}}" method="POST" class="justify-self-end relative flex items-center justify-center w-12 h-12 mt-2 mb-2 shadow-lg dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer bg-m-blue">
            @csrf
            <button type="submit">
                <i class="bi bi-trash text-xl"></i>
                <span class="left-14 absolute w-auto p-2 m-2 min-w-max rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{__('inbox.clear')}}
                </span>
            </button>
        </form>
        
    </div>
</div>
@endsection
