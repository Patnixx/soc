<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
<a href="{{$route}}" class="relative flex items-center justify-center sm:h-4 sm:w-4 md:w-6 md:h-6 lg:h-8 lg:w-8 xl:h-10 xl:w-10 2xl:h-12 2xl:w-12 mt-2 mb-2 mx-auto shadow-lg bg-m-red text-gray-900 hover:bg-m-darkblue hover:text-white dark:bg-m-darkblue dark:text-white dark:hover:bg-m-red dark:hover:text-gray-900 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer">
    <i class="{{$icon}} text-xl"></i>
    <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
        {{__('sidebar.'.$text.'')}}
    </span>
</a>
    