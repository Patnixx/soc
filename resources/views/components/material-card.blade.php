<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<a href="{{ route(''.$route.'', $syllab) }}" class="flex flex-col items-center justify-center p-6  shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-64 h-64 group {{$aclass}}">
    <i class="{{ $icon }} text-6xl mb-4  group-hover:text-white"></i>
    <span class="text-lg font-semibold  group-hover:text-white">{{$text}}</span>
</a>