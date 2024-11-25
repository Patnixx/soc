@extends('structures.auth')
@section('form')
    <div class="w-112 h-144 bg-gray-900 flex flex-col place-content-start justify-self-center mt-12 place-items-center rounded-4xl" id="form-control">
        <h2>Log In</h2>
        <form action="{{-- route('custom.login')--}}" method="post">
            <x-input-div :name="'Email'" :type="'email'" :placeholder="'Email'" :id="'email'" :value="''" :label="'Email'" :icon="'bi bi-envelope'"/>
            <x-input-div :name="'Password'" :type="'password'" :placeholder="'Password'" :id="'password'" :value="''" :label="'Password'" :icon="'bi bi-incognito'"/>
        </form>
    </div>
@endsection