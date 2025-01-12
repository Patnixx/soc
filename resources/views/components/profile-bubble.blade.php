<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
<a href="{{ route(''.$route.'') }}" class="flex flex-col items-center justify-center p-6 dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue shadow-lg rounded-3xl transform hover:scale-105 transition-all duration-300 ease-linear w-64 h-64 group">
    <i class="{{ $icon }} text-6xl mb-4 text-gray-800 dark:text-m-blue group-hover:text-white"></i>
    <span class="text-lg font-semibold text-gray-800 dark:text-m-blue group-hover:text-white">{{ __('profile.'.$text.'') }}</span>
</a>