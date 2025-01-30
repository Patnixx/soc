@extends('structures.auth')
@section('title', 'titel')
@section('content')
<div class="container">
    <h2>Email Verification Required</h2>
    <p>Before accessing some pages of this website, please check your email for a verification link.</p>
    <p>If you did not receive the email, click below to request another.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Resend Verification Email</button>
    </form>
    <p>or, continue to <a href="{{route('home')}}">homepage.</a></p>
</div>
@endsection