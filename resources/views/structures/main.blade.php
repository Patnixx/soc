@include('partials.head')
<body class="dark:bg-gray-800 bg-slate-200 grid grid-cols-[0.1fr,_0.9fr] duration-300 transition-all ease-linear mr-32 h-max {{--bg-[url('../../../public/assets/pattern/turbo-engines2.png')] dark:bg-[url('../../../public/assets/pattern/turbo-engine.png')]--}}">
    @if(Auth::check())
        @include('partials.sidebar', ['profile' => $user->f_name])
    @else
        @include('partials.sidebar', ['profile' => 'Profile'])
    @endif
    @yield('content')
    <x-language-popup />
</body>
@include('partials.footer')