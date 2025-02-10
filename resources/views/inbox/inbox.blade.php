@extends('structures.main')
@section('title', ''.__('title.inbox').'')
@section('content')
    <div class="p-6 mt-12">
        <div class="flex flex-col justify-start w-full">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{ __('inbox.inbox') }}</h1>
            @if($messages->isEmpty())
                <h2 class="text-lg text-gray-600 dark:text-gray-400 transition-all duration-300 ease-linear">{{ __('inbox.inbox-empty') }}</h2>
            @else
        </div>
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
        <div class="mt-6 flex flex-row justify-end w-full">
            <x-icon-div 
            :route="'new.message'"
            :icon="'bi bi-plus-circle'"
            :text="'msg-new'"
            :class="'justify-self-start'"
            :sclass="'right-14'"
            />
            <div class="w-4"></div>
            <x-icon-div 
            :route="'deleted.messages'"
            :icon="'bi bi-trash'"
            :text="'msg-del'"
            :class="'justify-self-end'"
            :sclass="'left-14'"
            />
        </div>

        <div id="activeMail" class="fixed bottom-4 right-4 bg-gray-200 dark:bg-gray-700 rounded-lg shadow-lg transition-all duration-300 ease-linear p-4 w-full max-w-md h-[50vh] md:w-[40%] md:max-w-lg overflow-auto hidden">
            <button id="closeMail" class="absolute top-2 right-2 text-gray-800 dark:text-gray-200 hover:text-red-500 dark:hover:text-red-400 text-xl font-bold focus:outline-none transition-colors duration-200 ease-linear">
                &times;
            </button>
            <h2 id="mailTitle" class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-2 border-b-2 border-gray-800 dark:border-gray-200"></h2>
            <div class="overflow-y-auto h-full">
                <p class="text-sm text-gray-600 dark:text-gray-400 font-bold">From: <span id="mailSender" class="font-normal"></span></p>
                <p id="mailDate" class="text-sm text-gray-600 dark:text-gray-400 font-bold"></p>
                <p id="mailContent" class="text-md text-gray-600 dark:text-gray-400 mt-8"></p>
            </div>
        </div>
    </div>
</div
@endsection
