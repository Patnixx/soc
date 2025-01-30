@extends('structures.main')
@section('title', 'chasmakar buzerant edit')
@section('content')
<div class="container mx-auto max-w-[70%] mt-32 rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear">
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">Edit Car:</h2>
    <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-2 gap-6 mb-6">
        @csrf
        @method('PUT')
        <div class="left">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="brand" class="text-sm font-medium dark:text-white text-gray-900">Brand</label>
                <x-input-div :name="'brand'" :type="'text'" :placeholder="'brand'" :id="'brand'" :value="''.$car->brand.''" :icon="'bi bi-car-front'"/>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="model" class="text-sm font-medium dark:text-white text-gray-900">Model</label>
                <x-input-div :name="'model'" :type="'text'" :placeholder="'model'" :id="'model'" :value="''.$car->model.''" :icon="'bi bi-car-front'"/>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="year" class="text-sm font-medium dark:text-white text-gray-900">Year</label>
                <x-input-div :name="'year'" :type="'text'" :placeholder="'year'" :id="'year'" :value="''.$car->year.''" :icon="'bi bi-calendar'"/>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="horsepower" class="text-sm font-medium dark:text-white text-gray-900">Horsepower</label>
                <x-input-div :name="'horsepower'" :type="'text'" :placeholder="'horsepower'" :id="'horsepower'" :value="''.$car->horsepower.''" :icon="'bi bi-speedometer'"/>
            </div>
        </div>
        <div class="right">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="cubage" class="text-sm font-medium dark:text-white text-gray-900">Cubage</label>
                <x-input-div :name="'cubage'" :type="'text'" :placeholder="'cubage'" :id="'cubage'" :value="''.$car->cubage.''" :icon="'bi bi-gear-wide-connected'"/>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="gearbox" class="text-sm font-medium dark:text-white text-gray-900">Gearbox</label>
                <x-input-div :name="'gearbox'" :type="'text'" :placeholder="'gearbox'" :id="'gearbox'" :value="''.$car->gearbox.''" :icon="'bi bi-gear'"/>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="drive" class="text-sm font-medium dark:text-white text-gray-900">Drive</label>
                <x-input-div :name="'drive'" :type="'text'" :placeholder="'drive'" :id="'drive'" :value="''.$car->drive.''" :icon="'bi bi-arrow-repeat'"/>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="mileage" class="text-sm font-medium dark:text-white text-gray-900">Mileage</label>
                <x-input-div :name="'mileage'" :type="'text'" :placeholder="'mileage'" :id="'mileage'" :value="''.$car->mileage.''" :icon="'bi bi-tachometer'"/>
            </div>
        </div>
        <div class="flex flex-col space-y-2 mb-2 col-span-2">
            <label for="images" class="text-sm font-medium dark:text-white text-gray-900">Upload New Images</label>
            <input type="file" name="images[]" multiple class="w-full h-12 py-3 pl-10 pr-4 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear">
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-floppy"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    Update
                </span>
            </button>
            <a href="{{ route('cars.index') }}" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    Back
                </span>
            </a>
        </div>
    </form>
</div>
@endsection