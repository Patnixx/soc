@extends('structures.main')
@section('content')
<div class="">
    <h1 class="text-m-red">COURSES</h1>
    @if($user->role == 'Admin')
        <h1>{{$courses}}</h1>
        <h1 class="text-m-red">FORMS</h1>
        <h1>{{$forms}}</h1>
    @endif
    @if($courses->isEmpty())
        <h1>NIC</h1>
        @if($user->role == 'Student')
            <a href="{{route('course.form')}}">Send form</a>
        @endif
        @if($user->role == 'Teacher')
            <a href="{{route('course.create')}}">Vytvoriť kurz</a>
        @endif
    @endif
</div>
@endsection