@extends('structures.main')
@section('title', ''.__('title.profile').'')
@section('content')
    <div class="w-full h-full flex flex-col justify-center items-center mt-12">
        <div class="w-160 h-160 bg-gray-900 shadow-lg rounded-3xl">
            <span class="text-m-blue text-4xl font-serif border-b-2 border-gray-400">Profile</span>
            <div id="bubbles" class="w-full grid grid-cols-[1fr,1fr] grid-rows-[1fr,1fr]">
                <x-profile-bubble :icon="'bi bi-person-circle'" :text="'Personal'" :route="'/'"/>
                <x-profile-bubble :icon="'bi bi-incognito'" :text="'Password'" :route="'/'"/>
                <x-profile-bubble :icon="'bi bi-envelope-fill'" :text="'Email'" :route="'/'"/>
                <x-profile-bubble :icon="'bi bi-house-fill'" :text="'Courses'" :route="'/'"/>
            </div>
        </div>
    </div>
@endsection