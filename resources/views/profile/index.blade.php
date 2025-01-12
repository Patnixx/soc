@extends('structures.main')
@section('title', ''.__('title.profile').'')
@section('content')
<div class="w-full h-full flex flex-col justify-center items-center mt-38">
    <div class="w-full h-full rounded-3xl p-8">
        <span class="text-gray-800 dark:text-white text-5xl font-serif block text-center mb-6">Profile</span>
        <div id="bubbles" class="w-full flex flex-row items-center justify-center gap-4">
            <x-profile-bubble :icon="'bi bi-person-circle'" :text="'personal'" :route="'personal'"/>
            <x-profile-bubble :icon="'bi bi-incognito'" :text="'password'" :route="'password'"/>
            <x-profile-bubble :icon="'bi bi-envelope-fill'" :text="'email'" :route="'email'"/>
            <x-profile-bubble :icon="'bi bi-person-lines-fill'" :text="'credits'" :route="'credits'"/>
        </div>
    </div>
</div>
@endsection