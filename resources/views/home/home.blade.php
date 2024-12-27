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
            <h2 class="text-3xl font-bold mb-4 text-gray-800 dark:text-m-blue">About Us</h2>
            <p class="text-lg text-gray-800 dark:text-m-blue">{{__('home.about')}}</p>
        </div>
    </section>

    <!-- Personnel Section -->
    <section id="personnel" class="py-16 px-8 flex flex-col">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-m-blue">Our Personnel</h2>
        <div class="flex flex-row items-center justify-center space-x-8">
            @foreach($teachers as $teacher)
                <div class="h-88 w-60 bg-white-900 dark:bg-gray-900 shadow-lg rounded-lg p-4 flex flex-col justify-end">
                    <img src="{{ asset('assets/users/'.$teacher->f_name.'_'.$teacher->l_name.'.jpg') }}" alt="Teacher" class="w-full h-60 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-m-blue">{{ $teacher->f_name }} {{$teacher->l_name}}</h3>
                    <p class="text-gray-800 dark:text-m-blue">{{ $teacher->role }}</p>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Cars Section -->
    <section id="cars" class="py-16 px-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-m-blue">Our Cars</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($cars as $car)
                <div class="bg-white shadow-lg rounded-lg p-4 bg-white-900 dark:bg-gray-900">
                    <img src="{{ asset('assets/img/motocycle.png') }}" alt="Car" class="w-full h-48 object-cover rounded-lg mb-4">
                    <h3 class="text-xl font-bold text-gray-800 dark:text-m-blue">{{$car->brand}} {{$car->model}}</h3>
                    <p class="text-gray-800 dark:text-m-blue">Horsepower: {{$car->horsepower}}</p>
                </div> 
            @endforeach
            
        </div>
    </section>

    <!-- Gallery Section 
    <section id="gallery" class="py-16 px-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-m-blue">Gallery</h2>
        <div class="relative">
            <img src="{{ asset('assets/img/gallery1.jpg') }}" alt="Gallery" class="w-full rounded-lg">
            <button class="absolute bottom-4 right-4 bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-green-600">View All</button>
        </div>
    </section>-->

    <!-- Contact Section -->
    <footer id="contact" class="bg-gray-900 text-white py-8 px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
        <p>Address: 123 Driving School Lane</p>
        <p>Phone: +1 234 567 890</p>
        <p>Email: contact@drivingschool.com</p>
    </footer>
</div>
@endsection