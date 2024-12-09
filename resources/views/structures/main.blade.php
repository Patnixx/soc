@include('partials.head')
<body class="dark:bg-gray-800 bg-slate-200 grid grid-cols-[0.1fr,_0.9fr] duration-300 transition-all ease-linear mr-32 h-max mt-16">
    @if(Auth::check())
        @include('partials.sidebar', ['profile' => $user->f_name])
    @else
        @include('partials.sidebar', ['profile' => 'Profile'])
    @endif
    @yield('content')
</body>
@include('partials.footer')