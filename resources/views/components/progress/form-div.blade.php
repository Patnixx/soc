<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<div class="card bg-gray-900 w-4/5 m-12 p-4 rounded-lg shadow-lg grid grid-cols-[0.9fr,0.1fr]">
    <div class="card-body space-y-3">
        <h1 class="text-lg font-semibold text-white mb-4">Name: {{$fname}} {{$lname}}</h1>
        <p class="text-white">Email: {{$email}}</p>
        <p class="text-white">Birthday: {{$birthday}}</p>
        <p class="text-white">Length: {{$length}}</p>
        <p class="text-white">Class: {{$class}}</p>
        <p class="text-white">Season: {{$season}}</p>
        <p class="text-white">Reason: {{$reason}}</p>
        <p class="text-white">Approval: {{$approval}}</p>
    </div>
    
    @if($approval != "Approved")
        <div class="flex flex-col justify-end">
            @if(request()->routeIs('course.assign'))
                <form action="{{route('custom.assign', ['id' => $id, 'courseid' => $courseid])}}" method="POST" class="inline-block">
                    @csrf
                    <button class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-blue-500 hover:bg-blue-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" 
                            type="submit">
                        <i class="bi bi-person-plus"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            Assign
                        </span>
                    </button>
                </form>
            @else
            <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-green-500 hover:bg-green-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('form.detail', $id)}}"">
                <i class="bi bi-filter-square"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    Detail
                </span>
            </a>
            <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-yellow-500 hover:bg-yellow-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('form.edit', $id)}}"">
                <i class="bi bi-pencil"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    Edit
                </span>
            </a>
            <form action="{{route('form.delete', $id)}}" method="POST" class="inline-block">
                @csrf
                <button class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-m-red hover:bg-m-red hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" type="submit">
                    <i class="bi bi-trash"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        Delete
                    </span>
                </button>
            </form>
        </div>
        @endif
    @endif
    
</div>