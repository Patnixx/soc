@extends('structures.main')
@section('content')
    <div id="content" class="w-[90%] h-full flex flex-col justify-center items-center">
        <div id="logo" class="">
            <span class="scale-150 group"><img src="{{asset('assets/logo/car-b.png')}}" alt="Nixxy"></span>
            <img src="{{asset('assets/logo/car-db.png')}}" alt="Nixxy" class="scale-0 group-hover:scale-150">
        </div>
    </div>
@endsection