<!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
<a class="{{$aclass}} grid grid-cols-8 w-full h-auto px-4 py-2 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all bg-gradient-to-br from-transparent via-transparent">
    <div class="flex items-center truncate">
        <span class="{{$sclass}} font-medium text-gray-900 dark:text-white">{{$id}}</span>
    </div>
    
    <div class="flex items-center text-sm truncate">
        <span class="{{$sclass}} text-gray-500 dark:text-gray-400">{{$name}}</span>
    </div>

    <div class="flex items-center text-sm truncate">
        <span class="{{$sclass}} text-gray-500 dark:text-gray-400">{{$start}}</span>
    </div>

    <div class="flex items-center text-sm truncate">
        <span class="{{$sclass}} text-gray-500 dark:text-gray-400">{{$diff}}</span>
    </div>

    <div class="flex items-center justify-end text-sm truncate space-x-4">
        <form action="{{route('events.edit', $id)}}" method="GET" class="flex items-center justify-center">
            @csrf
            <button type="submit">
                <i class="{{$iclass}} bi bi-pencil hover:text-gray-500 text-yellow-600 dark:hover:text-gray-400 dark:text-yellow-500"></i>
            </button>
        </form>
        <form action="{{route('events.delete', $id)}}" method="POST" class="flex items-center justify-center">
            @csrf
            <button type="submit">
                <i class="{{$iclass}} bi bi-trash hover:text-gray-500 text-red-600 dark:hover:text-gray-400 dark:text-red-500"></i>
            </button>
        </form>
    </div>
</a>