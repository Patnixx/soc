@extends('structures.main')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">Inbox</h1>
    @if($messages->isEmpty())
        <h2 class="text-lg text-gray-600 dark:text-gray-400 transition-all duration-300 ease-linear">Your inbox is empty</h2>
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
                    :route="'message.delete'"
                    :iclass="'bi bi-trash text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500'" 
                />
            @endforeach
        </div>
    @endif
    <div class="mt-6 flex flex-row justify-end">
        <x-icon-div 
        :route="'new.message'"
        :icon="'bi bi-plus-circle'"
        :text="'New Message'"
        :class="'justify-self-start'"
        :sclass="'right-14'"
        />
        <div class="w-4"></div>
        <x-icon-div 
        :route="'deleted.messages'"
        :icon="'bi bi-trash'"
        :text="'Deleted messages'"
        :class="'justify-self-end'"
        :sclass="'left-14'"
        />
    </div>
</div>
@endsection
