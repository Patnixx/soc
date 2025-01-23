@extends('structures.main')
@section('title', ''.__('materials.title').'')
@section('content')
<div class="w-full h-full flex flex-col justify-center items-center mt-32 pl-14">
    <div class="w-full h-full rounded-3xl p-8">
        <div class="flex flex-col justify-center space-x-4 pb-6">
            <span class="text-gray-800 dark:text-white text-5xl font-serif block text-center mb-6 mt-2">{{__('materials.title')}}</span>
            <h1 class="text-sm italic font-bold text-gray-800 dark:text-white">{{__('materials.info')}}</h1>
        </div>
        <div id="bubbles" class="w-full grid grid-cols-4 grid-flow-row items-end justify-center space-y-4">
            @foreach ($syllabs as $syllab)
                @if($user->role == 'Student')
                    <?php 
                        if($syllab->is_locked == 1)
                        {
                            $aclass = 'bg-gray-500 hover:bg-gray-600 dark:hover:bg-gray-600 text-gray-700 hover:text-800 dark:bg-gray-500 dark:text-gray-700';
                            $syllab->syllab->title = __('inbox.title');
                            $syllab->syllab->route = "";
                        }
                        elseif($syllab->is_locked == 0)
                        {
                            $aclass = "dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue text-gray-800 dark:text-m-blue group:text-white";
                        }
                    ?>
                    <x-material-card 
                        :icon="'bi bi-person-lines-fill'"
                        :text="''.$syllab->syllab->title.''"
                        :syllab="''.$syllab->syllab->route.''"
                        :route="'lecture'"
                        :aclass="''.$aclass.''"
                    />
                @else
                    <x-material-card 
                        :icon="'bi bi-person-lines-fill'"
                        :text="''.$syllab->title.''"
                        :syllab="''.$syllab->route.''"
                        :route="'lecture'"
                        :aclass="'dark:bg-gray-900 bg-m-blue hover:bg-m-red dark:hover:bg-m-darkblue text-gray-800 dark:text-m-blue group:text-white'"
                    />
                @endif
            @endforeach
            @if($user->role == 'Admin' || $user->role == 'Teacher')
                <x-profile-bubble :icon="'bi bi-person-plus-fill'" :text="'new-syllab'" :route="'materials.create.syllab'"/>
            @endif
        </div>
    </div>
</div>
@endsection