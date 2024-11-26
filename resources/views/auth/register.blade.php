@extends('structures.auth')
@section('form')
    <div class="w-112 h-144 bg-gray-900 flex flex-col place-content-start justify-self-center mt-12 place-items-center rounded-4xl" id="form-control">
        <h2>Register</h2>
        <form action="{{ route('custom.register')}}" method="post">
            @csrf
            <x-input-div :name="'f_name'" :type="'text'" :placeholder="'First Name'" :id="'f_name'" :value="''" :label="'First name'" :icon="'bi bi-envelope'"/>
            <x-input-div :name="'l_name'" :type="'text'" :placeholder="'Last Name'" :id="'l_name'" :value="''" :label="'Last name'" :icon="'bi bi-envelope'"/>
            <x-input-div :name="'email'" :type="'email'" :placeholder="'Email'" :id="'email'" :value="''" :label="'Email'" :icon="'bi bi-envelope'"/>
            <x-input-div :name="'password'" :type="'password'" :placeholder="'Password'" :id="'password'" :value="''" :label="'Password'" :icon="'bi bi-incognito'"/>
            <x-input-div :name="'c_pass'" :type="'password'" :placeholder="'Confirm Password'" :id="'c_pass'" :value="''" :label="'Confirm Password'" :icon="'bi bi-envelope'"/>
            <button type="submit">Register</button>
            <a href="{{route('home')}}">Back to Homepage</a>
        </form>
    </div>
@endsection