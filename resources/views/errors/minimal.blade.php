<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css"/>
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @vite(['public/build/assets/app-BHsjz7Ut.css'])
    </head>
    <body class="font-sans">
        <div class="relative flex flex-col items-center justify-center min-h-screen bg-gray-600">
            <div id="logo" class="flex justify-center">
                <img class="w-3/4 max-w-[250px] sm:max-w-[300px] md:max-w-[350px] lg:max-w-[400px]" src="{{ asset('assets/errors/'.trim(View::yieldContent('code')).'.png') }}" alt="Nixxy">
            </div>
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row items-center pt-8 sm:justify-start">
                    <div class="px-4 text-lg text-gray-500 hover:text-white border-r border-gray-900 tracking-wider transition-all duration-300 ease-linear">
                        @yield('code')
                    </div>
                    <div class="ml-4 text-lg text-gray-500 hover:text-white border-l border-gray-900 uppercase tracking-wider transition-all duration-300 ease-linear">
                        @yield('message')
                    </div>
                </div>
                <div class="flex justify-center items-center mt-4">
                    <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'/'" :sclass="'right-14'"/>
                </div>
            </div>
        </div>
    </body>
</html>