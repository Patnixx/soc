@include('partials.head')
<body class="dark:bg-gray-800 bg-slate-200 grid grid-cols-[0.25fr,0.75fr] duration-300 transition-all ease-linear mr-32 h-max {{--bg-[url('../../../public/assets/pattern/turbo-engines2.png')] dark:bg-[url('../../../public/assets/pattern/turbo-engine.png')]--}}">
    @include('partials.lecture-sidebar')
    @yield('content')
</body>
</html>