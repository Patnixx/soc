@include('partials.head')
<body class="bg-gray-800 grid grid-cols-[0.1fr,_0.9fr]">
    @if(Auth::check())
        @include('partials.sidebar', ['profile' => $user->f_name])
    @else
        @include('partials.sidebar', ['profile' => 'Profile'])
    @endif
    @yield('content')
</body>
@include('partials.footer')