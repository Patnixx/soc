<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<div class="w-full flex flex-col lg:flex-row bg-gray-100 dark:bg-gray-900 my-4 p-4 rounded-lg shadow-md transition-all duration-300 ease-linear hover:shadow-lg">
    <div class="flex-1 p-4">
        <h3 class="text-lg sm:text-xl font-bold mb-4 dark:text-m-blue text-gray-900 transition-all duration-300 ease-linear">
            {{$title}}
        </h3>
        <div class="mt-2 dark:text-white text-gray-600 text-sm sm:text-base">
            {{$content}}
        </div>
    </div>
    @if(isset($image))
        <div class="lg:w-1/5 h-full flex justify-center items-center p-4">
            @php
                $extensions = ['jpg', 'jpeg', 'png'];
                $imgPath = '';
                foreach ($extensions as $ext) {
                    if (file_exists(public_path('assets/znacky/' . $imgRoute . '.' . $ext))) {
                        $imgPath = asset('assets/znacky/' . $imgRoute . '.' . $ext);
                        break;
                        
                    }
                }
            @endphp
            <img 
                src="{{$imgPath}}" 
                alt="Image" 
                class="h-24 md:h-32 lg:h-auto w-full max-w-full object-fill rounded-lg transition-all duration-300 ease-linear"
            >
        </div>
    @endif
</div>