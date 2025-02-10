<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<div class="card duration-300 transition-all ease-linear bg-white dark:bg-gray-900 w-4/5 m-12 p-4 pl-12 rounded-lg shadow-lg grid grid-cols-[0.9fr,0.1fr] {{$divclass}} overflow-x-auto">
    <div class="card-body space-y-4 pt-4">
        <h1 class="font-semibold {{$hclass}} mb-4 {{$hclass}}">{{$fname}} {{$lname}}</h1>
        <p class="{{$pclass}}">{{__('courses.email')}}: <span class="{{$sclass}}">{{$email}}</span></p>
        @if(!(request()->routeIs('progress')))
            <p class="{{$pclass}}">{{__('courses.birth')}}: <span class="{{$sclass}}">{{$birthday}}</span></p>
        @endif
        <p class="{{$pclass}}">{{__('courses.length')}}: <span class="{{$sclass}}">{{$length}}</span></p>
        <p class="{{$pclass}}">{{__('courses.class')}}: <span class="{{$sclass}}">{{$class}}</span></p>
        <p class="{{$pclass}}">{{__('courses.season')}}: <span class="{{$sclass}}">{{$season}}</span></p>
        @if(!(request()->routeIs('course.assign')))
            <p class="{{$pclass}}">{{__('courses.approval')}}: <span class="{{$sclass}}">{{$approval}}</span></p>
        @endif
        @if(!(request()->routeIs('progress')))
            <p class="{{$pclass}}">{{__('courses.reason')}}: <span class="{{$sclass}}">{{$reason}}</span></p>
        @endif
    </div>
    @if($approval != "Approved" || Auth::user()->role == "Admin" || Auth::user()->role == "Teacher")
    <div class="flex flex-col justify-end">
        @if(request()->routeIs('form.detail'))
            <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{ route('progress') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.back')}}
                </span>
            </a>
        @elseif(request()->routeIs('course.assign'))
            <form action="{{ route('custom.assign', ['id' => $id, 'courseid' => $courseid]) }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-blue-500 hover:bg-blue-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer">
                    <i class="bi bi-person-plus"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.assign')}}
                    </span>
                </button>
            </form>
        @else
            <a class="h-12 w-12 mt-2 mb-2 mx-auto"></a>
            <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-green-500 hover:bg-green-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{ route('form.detail', $id) }}">
                <i class="bi bi-filter-square"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.detail')}}
                </span>
            </a>
            <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-yellow-500 hover:bg-yellow-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{ route('form.edit', $id) }}">
                <i class="bi bi-pencil"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.edit')}}
                </span>
            </a>
            <form action="{{ route('form.delete', $id) }}" method="POST" class="inline-block">
                @csrf
                <button class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" type="submit">
                    <i class="bi bi-trash"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.delete')}}
                    </span>
                </button>
            </form>
        @endif
    </div>
    @endif
</div>
