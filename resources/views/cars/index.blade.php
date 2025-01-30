@extends('structures.main')
@section('title', 'chasmakar buzerant')
@section('content')
<div class="container px-4 py-6 mt-12">

    <!-- Add New Car Button -->
    @if($user->role == 'Admin' || $user->role == 'Teacher')
        <div class="w-full flex justify-end py-4">
            <a href="{{ route('cars.create') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-linear">Add New Car</a>
        </div>
    @endif
    <!-- Cars List -->
    <div class="flex flex-col gap-4">
        @foreach($cars as $car)
            <div class="w-full max-h-64 flex gap-4 shadow-2xl rounded-lg p-4 bg-white dark:bg-gray-800 duration-300 transition-all ease-linear">
                
                <!-- Carousel for Car Images -->
                <div class="flex-1 relative overflow-hidden rounded-lg">
                    <div class="carousel flex">
                        @foreach($car->images as $index => $image)
                            <!-- Set object-contain for image to avoid cropping and maintain aspect ratio -->
                            <img src="{{ asset('storage/car_images/' . $image->image_name) }}" alt="Car Image"
                                class="w-full h-64 object-scale-down carousel-item {{ $index == 0 ? 'block' : 'hidden' }}">
                        @endforeach
                    </div>
                
                    <!-- Carousel Navigation Buttons -->
                    <button onclick="moveCarousel({{ $loop->index }}, -1)" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-m-blue dark:bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue text-white rounded-full p-2 duration-300 transition-all ease-linear">
                        <svg class="w-4 h-4 transition-transform transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9l6 6 6-6"></path>
                        </svg>                    </button>
                    <button onclick="moveCarousel({{ $loop->index }}, 1)" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-m-blue dark:bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue text-white rounded-full p-2 duration-300 transition-all ease-linear">
                        <svg class="w-4 h-4 transition-transform transform -rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 9l6 6 6-6"></path>
                        </svg>                    </button>
                </div>
                
                
                <!-- Car Data Table -->
                <div class="flex-1 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-300">
                        <tbody>
                            <tr>
                                <td class="font-bold">{{__('car.brand')}}</td>
                                <td>{{ $car->brand }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.model')}}</td>
                                <td>{{ $car->model }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.year')}}</td>
                                <td>{{ $car->year }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.hp')}}r</td>
                                <td>{{ $car->horsepower }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.engine')}}</td>
                                <td>{{ $car->cubage }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.gearbox')}}</td>
                                <td>{{ $car->gearbox }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.drive')}}</td>
                                <td>{{ $car->drive }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold">{{__('car.mileage')}}</td>
                                <td>{{ $car->mileage }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                @if($user->role == 'Admin' || $user->role == 'Teacher')
                    <div class="flex flex-col mt-4 items-center justify-end">
                        <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-yellow-500 hover:bg-yellow-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('cars.edit',$car)}}"">
                            <i class="bi bi-pencil"></i>
                            <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                                {{__('courses.edit')}}
                            </span>
                        </a>                        
                        <form action="{{route('cars.destroy', $car)}}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-m-red hover:bg-m-red hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" type="submit">
                                <i class="bi bi-trash"></i>
                                <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                                    {{__('courses.delete')}}
                                </span>
                            </button>
                        </form>
                    </div>
                @endif
                
            </div>
        @endforeach
    </div>

</div>

<script>
    function moveCarousel(carIndex, direction) {
        const carousel = document.querySelectorAll('.carousel')[carIndex];
        const items = carousel.querySelectorAll('.carousel-item');
        let currentIndex = [...items].findIndex(item => item.classList.contains('block'));

        // Remove the current "block" class
        items[currentIndex].classList.remove('block');
        items[currentIndex].classList.add('hidden');

        // Calculate the new index
        const nextIndex = (currentIndex + direction + items.length) % items.length;

        // Show the next image
        items[nextIndex].classList.remove('hidden');
        items[nextIndex].classList.add('block');
    }
</script>
@endsection