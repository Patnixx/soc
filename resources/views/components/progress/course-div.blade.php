<!-- Simplicity is an acquired taste. - Katharine Gerould -->
<div class="card duration-300 transition-all ease-linear bg-white dark:bg-gray-900 w-4/5 m-12 p-4 pl-12 rounded-lg shadow-lg grid grid-cols-[0.9fr,0.1fr] {{$divclass}}">
    <div class="card-body space-y-4 pt-4">
        <h1 class="font-semibold text-m-blue dark:text-white mb-4 {{$hclass}}">{{$name}}</h1>
        <p class="{{$pclass}}">{{__('courses.teacher')}}: <span class="{{$sclass}}">{{$teacher}}</span></p>
        @if(!(request()->routeIs('progress')))
            <p class="{{$pclass}}">{{__('courses.students')}}: <span class="{{$sclass}}">{{$students}}</span></p>
        @endif
        <p class="{{$pclass}}">{{__('courses.class')}}: <span class="{{$sclass}}">{{$class}}</span></p>
        <p class="{{$pclass}}">{{__('courses.length')}}: <span class="{{$sclass}}">{{__('courses.'.$length)}}</span></p>
        <p class="{{$pclass}}">{{__('courses.status')}}: <span class="{{$sclass}}">{{__('courses.'.$status)}}</span></p>
        <p class="{{$pclass}}">{{__('courses.season')}}: <span class="{{$sclass}}">{{__('courses.'.$season)}}</span></p>
        @if(request()->routeIs('course.detail'))
            <p class="{{$pclass}}">{{__('courses.description')}}: <span class="{{$sclass}}">{{$description}}</span></p>
        @endif
    </div>
    <div class="flex flex-col justify-end">
        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teacher')
            @if(request()->routeIs('course.detail'))
                    <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('progress')}}"">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('courses.back')}}
                        </span>
                    </a>
            @endif
            @if(request()->routeIs('course.assign'))
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('progress')}}"">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.back')}}
                    </span>
                </a>
            @endif
            @if(request()->routeIs('course.unassign'))
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('progress')}}"">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.back')}}
                    </span>
                </a>
            @endif
            @if(request()->routeIs('progress'))
                @if($course->status != 'Finished')
                    <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-blue-500 hover:bg-blue-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('course.assign', $id)}}"">
                        <i class="bi bi-person-plus"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('courses.assign')}}
                        </span>
                    </a>
                @endif
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-green-500 hover:bg-green-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('course.detail', $id)}}"">
                    <i class="bi bi-filter-square"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.detail')}}
                    </span>
                </a>
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-yellow-500 hover:bg-yellow-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('course.edit',$id)}}"">
                    <i class="bi bi-pencil"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.edit')}}
                    </span>
                </a>
                <form action="{{route('course.delete', $id)}}" method="POST" class="inline-block">
                    @csrf
                    <button class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-m-red hover:bg-m-red hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" type="submit">
                        <i class="bi bi-trash"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('courses.delete')}}
                        </span>
                    </button>
                </form>
            @endif
        @endif
        @if(Auth::user()->role == 'Student')
            @if(request()->routeIs('course.detail'))
                    <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('progress')}}"">
                        <i class="bi bi-box-arrow-right"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('courses.back')}}
                        </span>
                    </a>
            @endif
            @if(request()->routeIs('progress'))
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-green-500 hover:bg-green-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('course.detail', $id)}}"">
                    <i class="bi bi-filter-square"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.detail')}}
                    </span>
                </a>
            @endif
        @endif
    </div>
</div>