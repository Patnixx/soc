<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
<a class="grid grid-cols-[0.2fr,1.2fr,0.5fr,0.1fr] w-full h-auto px-4 py-2 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all">
    <div class="flex items-center truncate">
        <span class="{{$sclass}} font-medium text-gray-900 dark:text-white">{{$sender}}</span>
    </div>

    <div class="flex items-center truncate">
        <span class="{{$sclass}}">
            <strong>{{$title}}</strong>
            <span class="text-gray-500 dark:text-gray-400"> - {{$content}}</span>
        </span>
    </div>

    <div class="flex items-center justify-end text-sm truncate">
        <span class="{{$sclass}} text-gray-500 dark:text-gray-400">{{$date}}</span>
    </div>

    <form action="{{route(''.$route.'', $id)}}" method="POST" class="flex items-center justify-center">
        @csrf
        <button type="submit">
            <i class="{{$iclass}} cursor-pointer"></i>
        </button>
    </form>
</a>
