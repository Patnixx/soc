@extends('structures.main')
@section('title', 'chasmakar buzerant create')
@section('content')
<div class="container mx-auto max-w-[90%] md:max-w-[70%] mt-20 md:mt-32 rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear">
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">{{__('car.add')}}:</h2>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        @csrf
        <div class="flex flex-col space-y-4">
            <x-input-div :name="'brand'" :type="'text'" :placeholder="'brand'" :id="'brand'" :value="''" :icon="'bi bi-car-front'"/>
            <x-input-div :name="'model'" :type="'text'" :placeholder="'model'" :id="'model'" :value="''" :icon="'bi bi-car-front'"/>
            <x-input-div :name="'year'" :type="'text'" :placeholder="'year'" :id="'year'" :value="''" :icon="'bi bi-calendar'"/>
            <x-input-div :name="'horsepower'" :type="'text'" :placeholder="'hp'" :id="'horsepower'" :value="''" :icon="'bi bi-rocket-takeoff'"/>
        </div>
        <div class="flex flex-col space-y-4">
            <x-input-div :name="'cubage'" :type="'text'" :placeholder="'engine'" :id="'cubage'" :value="''" :icon="'bi bi-gear-wide-connected'"/>
            <x-input-div :name="'gearbox'" :type="'text'" :placeholder="'gearbox'" :id="'gearbox'" :value="''" :icon="'bi bi-gear'"/>
            <x-input-div :name="'drive'" :type="'text'" :placeholder="'drive'" :id="'drive'" :value="''" :icon="'bi bi-arrow-repeat'"/>
            <x-input-div :name="'mileage'" :type="'text'" :placeholder="'mileage'" :id="'mileage'" :value="''" :icon="'bi bi-speedometer'"/>
        </div>
        <div class="flex flex-col space-y-2 col-span-1 md:col-span-2">
            <label for="images" class="text-sm font-medium dark:text-white text-gray-900">{{__('car.upload')}}</label>
            <input type="file" name="images[]" multiple class="w-full h-12 py-3 pl-10 pr-4 dark:bg-gray-800 dark:text-white bg-slate-200 rounded-lg focus:ring-1 dark:focus:ring-m-blue focus:ring-gray-900 transition-all duration-300 ease-linear">
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center space-y-4 md:space-x-4 md:space-y-0 col-span-1 md:col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-12 w-12 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-floppy"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('car.add')}}
                </span>
            </button>
            <a href="{{ route('cars.index') }}" class="relative flex items-center justify-center h-12 w-12 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('car.back')}}
                </span>
            </a>
        </div>
    </form>
</div>
@endsection
