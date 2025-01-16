@extends('structures.main')
@section('title', ''.__('title.profile').'')
@section('content')
<div class="w-full h-full flex flex-col justify-center items-center mt-32 pl-14">
    <div class="w-full h-full rounded-3xl p-8">
        <span class="text-gray-800 dark:text-white text-5xl font-serif block text-center mb-6">Materials</span>
        <div id="bubbles" class="w-full grid grid-cols-4 grid-flow-row items-end justify-center space-y-4">
            <x-material-card :icon="'bi bi-person-circle'" :text="'personal'" :route="'personal'"/>
            <x-material-card :icon="'bi bi-incognito'" :text="'password'" :route="'password'"/>
            <x-material-card :icon="'bi bi-envelope-fill'" :text="'email'" :route="'email'"/>
            <x-material-card :icon="'bi bi-person-lines-fill'" :text="'credits'" :route="'credits'"/>
            @if($user->role == 'Admin')
                <x-material-card :icon="'bi bi-person-plus-fill'" :text="'new-syllab'" :route="'materials.create.syllab'"/>
            @endif
        </div>
    </div>
</div>
@endsection