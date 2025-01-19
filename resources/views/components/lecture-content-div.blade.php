<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<div class="w-full flex flex-col md:flex-row bg-gray-100">
    <div class="flex-1 p-4">
        <h3 class="text-xl font-semibold">{{ $title }}</h3>
        <div class="mt-2">
            {{ $content }}
        </div>
    </div>
    @if(isset($image))
        <div class="md:w-1/5 h-full flex justify-center items-center p-4">
            <img src="{{ $image }}" alt="Image" class="h-full w-full object-cover rounded-lg">
        </div>
    @endif
</div>