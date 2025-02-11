<!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
<div class="card duration-300 transition-all ease-linear bg-white dark:bg-gray-900 w-4/5 m-12 p-4 pl-12 rounded-lg shadow-lg grid grid-cols-[0.9fr,0.1fr] {{$divclass}}">
    <div class="card-body space-y-4 pt-4">
        <h1 class="font-semibold text-m-blue dark:text-white mb-4 {{$hclass}}">{{__('courses.email')}}: {{$email}}</h1>
        <p class="{{$pclass}}">#: <span class="{{$sclass}}">{{$userid}}</span></p>
        <p class="{{$pclass}}">{{__('courses.f-name')}}: <span class="{{$sclass}}">{{$fname}}</span></p>
        <p class="{{$pclass}}">{{__('courses.l-name')}}: <span class="{{$sclass}}">{{$lname}}</span></p>
        <p class="{{$pclass}}">{{__('courses.birth')}}: <span class="{{$sclass}}">{{$birthday}}</span></p>
        <p class="{{$pclass}}">{{__('courses.tel')}}: <span class="{{$sclass}}">{{$tel}}</span></p>
        <p class="{{$pclass}}">{{__('courses.assigned-since')}}: <span class="{{$sclass}}">{{$since}}</span></p>
    </div>
    <div class="flex flex-col justify-end">
        @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Teacher')
            <form action="{{ route('custom.unassign', ['courseid' => $courseid, 'id' => $userid]) }}" method="POST" class="inline-block">
                @csrf
                <button type="submit" class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-blue-500 hover:bg-blue-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer">
                    <i class="bi bi-person-dash"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('courses.unassign')}}
                    </span>
                </button>
            </form>
        @endif
    </div>
</div>