@extends('structures.main')
@section('content')
<div class="div">
    <form action="{{route('custom.message', $user->id)}}" method="post">
        @csrf
        <input type="email" name="email" id="email" placeholder="Email to send to:">
        <input type="text" name="title" id="title" placeholder="Title:">
        <input type="text" name="content" id="content" placeholder="Content:">
        <button type="submit">Send message</button>
    </form>
    <a href="{{route('inbox')}}">Back to inbox</a>
</div>
@endsection