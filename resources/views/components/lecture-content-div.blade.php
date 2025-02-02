<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<div class="w-full flex flex-col md:flex-row bg-gray-100 dark:bg-gray-900 my-4 p-4 rounded-lg shadow-md duration-300 transition-all ease-linear">
    <div class="flex-1 p-4">
        <h3 class="text-xl font-bold mb-4 dark:text-m-blue text-gray-900 transition-all duration-300 ease-linear">{{ $title }}</h3>
        <div class="mt-2 dark:text-white text-gray-600">
            {{ $content }}
        </div>
    </div>
    @if(isset($image))
        <div class="md:w-1/5 h-full flex justify-center items-center p-4">
            <img src="{{asset('assets/znacky/'.$imgRoute.'.jpg')}}" alt="Image" class="h-full max-w-40 object-cover rounded-lg">
        </div>
    @endif
</div>