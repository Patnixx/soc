@include('partials.head')

    <body class="bg-gray-800">
        @if(Auth::check())
            @include('partials.sidebar', ['profile' => $user->f_name])
        @else
            @include('partials.sidebar', ['profile' => 'Profile'])
        @endif
    </body>
</html>