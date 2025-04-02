@include('partials.head')
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
                    <div class="ml-4 text-lg text-gray-500 hover:text-white uppercase tracking-wider transition-all duration-300 ease-linear">
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