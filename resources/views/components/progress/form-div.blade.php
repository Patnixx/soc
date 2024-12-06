<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
<div class="card bg-gray-900 w-4/5 m-12 p-4 rounded-lg shadow-lg grid grid-cols-[0.9fr,0.1fr]">
    <div class="card-body space-y-3">
        <h1 class="font-semibold text-white mb-4 {{$hclass}}">{{$fname}} {{$lname}}</h1>
        <p class="text-white">Email: <span class="{{$sclass}}">{{$email}}</span></p>
        <p class="text-white">Birthday: <span class="{{$sclass}}">{{$birthday}}</span></p>
        <p class="text-white">Length: <span class="{{$sclass}}">{{$length}}</span></p>
        <p class="text-white">Class: <span class="{{$sclass}}">{{$class}}</span></p>
        <p class="text-white">Season: <span class="{{$sclass}}">{{$season}}</span></p>
        <p class="text-white">Reason: <span class="{{$sclass}}">{{$reason}}</span></p>
        <p class="text-white">Approval: <span class="{{$sclass}}">{{$approval}}</span></p>
    </div>
    
    @if($approval != "Approved" || Auth::user()->role == "Admin")
        <div class="flex flex-col justify-end">
            @if(request()->routeIs('form.detail'))
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('progress')}}"">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        Back
                    </span>
                </a>
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