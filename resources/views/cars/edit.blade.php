@extends('structures.main')
@section('title', 'chasmakar buzerant edit')
@section('content')
<div class="container mx-auto max-w-4xl sm:max-w-1/2 mt-20 p-6 bg-white dark:bg-gray-900 shadow-lg rounded-lg transition-all duration-300 ease-linear">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6 text-center">Edit Car:</h2>
    <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        @csrf
        @method('PUT')
        <div class="space-y-4">
            <div>
                <label for="brand" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.brand') }}</label>
                <x-input-div name="brand" type="text" placeholder="brand" id="brand" :value="$car->brand" icon="bi bi-car-front"/>
            </div>
            <div>
                <label for="model" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.model') }}</label>
                <x-input-div name="model" type="text" placeholder="model" id="model" :value="$car->model" icon="bi bi-car-front"/>
            </div>
            <div>
                <label for="year" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.year') }}</label>
                <x-input-div name="year" type="text" placeholder="year" id="year" :value="$car->year" icon="bi bi-calendar"/>
            </div>
            <div>
                <label for="horsepower" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.hp') }}</label>
                <x-input-div name="horsepower" type="text" placeholder="hp" id="horsepower" :value="$car->horsepower" icon="bi bi-rocket-takeoff"/>
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label for="cubage" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.engine') }}</label>
                <x-input-div name="cubage" type="text" placeholder="engine" id="cubage" :value="$car->cubage" icon="bi bi-gear-wide-connected"/>
            </div>
            <div>
                <label for="gearbox" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.gearbox') }}</label>
                <x-input-div name="gearbox" type="text" placeholder="gearbox" id="gearbox" :value="$car->gearbox" icon="bi bi-gear"/>
            </div>
            <div>
                <label for="drive" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.drive') }}</label>
                <x-input-div name="drive" type="text" placeholder="drive" id="drive" :value="$car->drive" icon="bi bi-arrow-repeat"/>
            </div>
            <div>
                <label for="mileage" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.mileage') }}</label>
                <x-input-div name="mileage" type="text" placeholder="mileage" id="mileage" :value="$car->mileage" icon="bi bi-speedometer"/>
            </div>
        </div>
        <div class="col-span-1 sm:col-span-2">
            <label for="images" class="text-sm font-medium text-gray-900 dark:text-white">{{ __('car.upload') }}</label>
            <input type="file" name="images[]" multiple class="w-full h-12 py-3 pl-10 pr-4 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear">
        <div class="flex justify-center items-center space-x-4 col-span-1 sm:col-span-2 mt-12">
            <button type="submit" class="relative flex items-center justify-center h-12 w-12 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-floppy"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{ __('car.update') }}
                </span>
            </button>
            <a href="{{ route('cars.index') }}" class="relative flex items-center justify-center h-12 w-12 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{ __('car.back') }}
                </span>
            </a>
        </div>
    </form>
</div>
@endsection
