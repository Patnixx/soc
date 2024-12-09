<a href="{{route(''.$route.'')}}" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer bg-m-blue">
    <i class="{{$icon}} text-xl"></i>
    <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
        {{$text}}
    </span>
</a>
