@extends('structures.main')
@section('title', ''.__('title.home').'')
@section('content')
<div class="w-full">
    <section id="hero" class="h-screen w-full px-4">
        <div id="content" class="h-full flex flex-row items-center justify-center pb-40">
            <div id="main" class="w-full grid grid-cols-1 md:grid-cols-2 gap-8">
                <div id="logo" class="w-full h-full flex self-center justify-center">
                    <img class="w-full max-w-sm md:max-w-md lg:max-w-lg" src="{{ asset('assets/img/speedometer.png') }}" alt="Nixxy">
                </div>
                <div id="main-text" class="flex flex-col items-center justify-center text-center">
                    <div class="bg-m-blue dark:bg-gray-900 p-4 rounded-2xl group transition-all duration-300 ease-linear border-r-4 border-b-4 border-m-red dark:border-m-darkblue">
                        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 dark:text-m-blue">{{ __('home.name') }}</h1>
                        <p class="text-lg md:text-xl mt-4 text-gray-800 dark:text-m-blue">{{ __('home.description') }}</p> 
                    </div>   
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="flex flex-col md:flex-row items-center py-16 px-8 space-y-8 md:space-y-0 md:space-x-8">
        <img src="{{ asset('assets/img/motocycle.png') }}" alt="About Us" class="w-full md:w-1/2 rounded-lg shadow-lg bg-white-900 dark:bg-gray-900">
        <div class="bg-m-blue dark:bg-gray-900 p-4 rounded-2xl group transition-all duration-300 ease-linear border-r-4 border-b-4 border-m-red dark:border-m-darkblue">
            <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-m-blue">{{__('home.about-title')}}</h2>
            <p class="text-lg text-gray-800 dark:text-m-blue">{{__('home.about')}}</p>
        </div>
    </section>

    <!-- Personnel Section -->
    <section id="personnel" class="flex flex-col md:flex-row items-center py-16 px-8 space-y-8 md:space-y-0 md:space-x-8">
        <div class="bg-m-blue dark:bg-gray-900 p-4 rounded-2xl group transition-all duration-300 ease-linear border-r-4 border-b-4 border-m-red dark:border-m-darkblue">
            <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-m-blue">{{__('home.personel-title')}}</h2>
            <p class="text-lg text-gray-800 dark:text-m-blue">{{__('home.personel')}}</p>
        </div>
        <img src="{{ asset('assets/img/gps.png') }}" alt="Personnel" class="w-full md:w-1/2 rounded-lg shadow-lg bg-white-900 dark:bg-gray-900">
    </section>
    <!-- Cars Section -->
    <section id="cars" class="py-16 px-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-m-blue">{{__('home.cars-title')}}:</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($cars as $car)
                <div class="bg-white shadow-lg rounded-lg p-4 bg-white-900 dark:bg-gray-900">
                    <img src="{{ asset('storage/car_images/'.$car->images[1]->image_name) }}" alt="Car" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-m-blue">{{$car->brand}} {{$car->model}}</h3>
                    <p class="text-gray-800 dark:text-m-blue">{{__('home.year')}}: {{$car->year}}</p>
                </div> 
            @endforeach
        </div>
        <h2 class="dark:text-gray-400 dark:hover:text-m-blue text-m-blue hover:text-gray-900 transition duration-300 text-center pt-6"><a href="{{route('cars.index')}}">Car Gallery</a></h2>
    </section>

    <!-- Contact Section -->
    <footer id="contact" class="dark:bg-gray-900 bg-white dark:text-white text-gray-800 py-8 w-[100%] text-center duration-300 transition-all ease-linear">
        <h2 class="text-3xl font-bold mb-4">{{__('home.contact')}}</h2>
        <p>{{__('home.address-title')}}:  Slobody 43, 022 01 Čadca</p>
        <p>{{__('home.phone')}}: 0904 924 562</p>
        <p>{{__('home.email')}}: contact@drivingschool.com</p>
    </footer>
</div>
@endsection