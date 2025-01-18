@extends('structures.main')
@section('title', ''.__('materials.title').'')
@section('content')
<div class="w-full h-full flex flex-col justify-center items-center mt-32 pl-14">
    <div class="w-full h-full rounded-3xl p-8">
        <span class="text-gray-800 dark:text-white text-5xl font-serif block text-center mb-6">{{__('materials.title')}}</span>
        <div id="bubbles" class="w-full grid grid-cols-4 grid-flow-row items-end justify-center space-y-4">
            @foreach ($syllabs as $syllab)
                <x-material-card 
                    :icon="'bi bi-person-lines-fill'"
                    :text="''.$syllab->title.''"
                    :syllab="''.$syllab->route.''"
                    :route="'lecture'"
                />
            @endforeach
            @if($user->role == 'Admin' || $user->role == 'Teacher')
                <x-profile-bubble :icon="'bi bi-person-plus-fill'" :text="'new-syllab'" :route="'materials.create.syllab'"/>
            @endif
        </div>
    </div>
</div>
@endsection