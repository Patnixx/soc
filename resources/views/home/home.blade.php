@extends('structures.main')
@section('title', ''.__('title.home').'')
@section('content')
<div class="w-full">
    <section id="hero" class="min-h-screen w-full px-4 flex items-center justify-center">
        <div id="content" class="w-full flex flex-col md:flex-row items-center justify-center pb-20">
            <div id="main" class="w-full grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div id="logo" class="flex justify-center">
                    <img class="w-3/4 max-w-[250px] sm:max-w-[300px] md:max-w-[350px] lg:max-w-[400px]" src="{{ asset('assets/img/speedometer.png') }}" alt="Nixxy">
                </div>
                <div id="main-text" class="flex flex-col items-center justify-center text-center">
                    <div class="bg-m-blue dark:bg-gray-900 p-6 rounded-2xl border-r-4 border-b-4 border-m-red dark:border-m-darkblue transition-all duration-300">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-800 dark:text-m-blue">{{ __('home.name') }}</h1>
                        <p class="text-base sm:text-lg md:text-xl mt-4 text-gray-800 dark:text-m-blue">{{ __('home.description') }}</p> 
                    </div>   
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="flex flex-col md:flex-row items-center py-16 px-6 space-y-8 md:space-y-0 md:space-x-8">
        <img src="{{ asset('assets/img/motocycle.png') }}" alt="About Us" class="w-full md:w-1/2 rounded-lg shadow-lg">
        <div class="bg-m-blue dark:bg-gray-900 p-6 rounded-2xl border-r-4 border-b-4 border-m-red dark:border-m-darkblue transition-all duration-300">
            <h2 class="text-2xl sm:text-3xl font-bold mb-4 text-gray-800 dark:text-m-blue">{{__('home.about-title')}}</h2>
            <p class="text-base sm:text-lg text-gray-800 dark:text-m-blue">{{__('home.about')}}</p>
        </div>
    </section>
    <section id="personnel" class="flex flex-col md:flex-row items-center py-16 px-6 space-y-8 md:space-y-0 md:space-x-8">
        <div class="bg-m-blue dark:bg-gray-900 p-6 rounded-2xl border-r-4 border-b-4 border-m-red dark:border-m-darkblue transition-all duration-300">
            <h2 class="text-2xl sm:text-3xl font-bold mb-4 text-gray-800 dark:text-m-blue">{{__('home.personel-title')}}</h2>
            <p class="text-base sm:text-lg text-gray-800 dark:text-m-blue">{{__('home.personel')}}</p>
        </div>
        <img src="{{ asset('assets/img/gps.png') }}" alt="Personnel" class="w-full md:w-1/2 rounded-lg shadow-lg">
    </section>
    <section id="cars" class="py-16 px-6">
        <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-center text-gray-800 dark:text-m-blue transition-all duration-300 ease-linear">{{__('home.cars-title')}}:</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($cars as $car)
                <div class="bg-white shadow-lg rounded-lg p-4 dark:bg-gray-900 transition-all duration-300 ease-linear">
                    <img src="{{ asset('assets/car_images/'.$car->images[0]->image_name) }}" alt="Car" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-800 dark:text-m-blue">{{$car->brand}} {{$car->model}}</h3>
                    <p class="text-gray-800 dark:text-m-blue">{{__('home.year')}}: {{$car->year}}</p>
                </div> 
            @endforeach
        </div>
        <h2 class="dark:text-gray-400 dark:hover:text-m-blue text-m-blue hover:text-gray-900 transition duration-300 text-center pt-6">
            <a href="{{route('cars.index')}}">Car Gallery</a>
        </h2>
    </section>
    @include('partials.homepage-footer')
</div>
@endsection