@extends('structures.main')
@section('title', ''.__('title.create-form').'')
@section('content')
<div class="container mx-auto max-w-[90%] md:max-w-[70%] rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear mt-36">
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">{{__('courses.form-create')}}:</h2>
    <form action="{{route('custom.form')}}" method="post" class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        @csrf
        <div class="flex flex-col space-y-2">
            <label for="f_name" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.f-name')}}</label>
            <input required type="text" name="f_name" id="f_name" placeholder="{{__('courses.f-name')}}" value="{{$user->f_name}}" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="l_name" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.l-name')}}</label>
            <input required type="text" name="l_name" id="l_name" placeholder="{{__('courses.l-name')}}" value="{{$user->l_name}}" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="email" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.email')}}</label>
            <input required type="email" name="email" id="email" placeholder="{{__('courses.email')}}" value="{{$user->email}}" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="birthday" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.birth')}}</label>
            <input required type="date" name="birthday" id="birthday" value="{{$user->birthday}}" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
        </div>
        <div class="flex flex-col space-y-2">
            <label for="user" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.user')}}</label>
            <select required name="user" id="user" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                @if($user->role == 'Admin' || $user->role == 'Teacher')
                    @foreach($user_wo_form as $acc)
                        <option value="{{$acc->id}}">{{$acc->f_name}} {{$acc->l_name}} ({{$acc->email}})</option>
                    @endforeach
                @else
                    <option value="{{$user->id}}">{{$user->f_name}} {{$user->l_name}} ({{$user->email}})</option>
                @endif
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="season" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.season')}}</label>
            <select required name="season" id="season" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                <option value="Spring">{{__('courses.spring')}}</option>
                <option value="Summer">{{__('courses.summer')}}</option>
                <option value="Autumn">{{__('courses.autumn')}}</option>
                <option value="Winter">{{__('courses.winter')}}</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="length" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.length')}}</label>
            <select required name="length" id="length" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                <option value="Classic">{{__('courses.classic')}}</option>
                <option value="Turbo">{{__('courses.turbo')}}</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2">
            <label for="class" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.class')}}</label>
            <select required name="class" id="class" class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
        </div>
        <div class="flex flex-col space-y-2 md:col-span-2">
            <label for="reason" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.reason')}}</label>
            <textarea required name="reason" id="reason" placeholder="{{__('courses.reason')}}" class="w-full px-4 py-2 h-31 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none"></textarea>
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-1 md:col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-plus-circle"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.create')}}
                </span>
            </button>
            <a href="{{route('progress')}}" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.back')}}
                </span>
            </a>
        </div>
    </form>
</div>

@endsection