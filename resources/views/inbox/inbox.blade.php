@extends('structures.main')
@section('content')
<div class="div">
    <h1>INBOX</h1>
    @if($messages->isEmpty())
        <h1>Inbox empty</h1>
    @else
        @foreach ($messages as $message)
            <div class="mail dark:bg-gray-900 bg-white w-24 transition-all duration-300 ease-linear">
                <h1>{{$message->title}}</h1>
                <h3>{{$message->content}}</h3>
            </div>
            
        @endforeach
    @endif
    <a href="{{route('new.message')}}">Write a message</a>
</div>
@endsection