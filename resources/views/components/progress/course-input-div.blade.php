<!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->
<div class="card duration-300 transition-all ease-linear bg-white dark:bg-gray-900 w-4/5 m-12 p-4 pl-12 rounded-lg shadow-lg grid grid-cols-[0.9fr,0.1fr] {{$divclass}}">
    <form method="POST" action="{{route('course.update', $id)}}" class="card-body space-y-4">
        @csrf
        <h1 class="mb-4 {{$hclass}}">Name: 
            <input class="{{$iptclass}}" type="text" name="name" id="name" placeholder="{{$name}}" required>
        </h1>
        @if(request()->routeIs('course.detail'))
            <h3 class="font-semibold text-white mb-4 {{$tclass}}">Teacher: {{$teacher}}</h3>
        @endif
        <p class="{{$sclass}}">Description:
            <input type="text" placeholder="{{$description}}" name="desc" id="desc" class="{{$iptclass}}" required>
        </p>
        <span class="{{$sclass}}">Class:
            <select name="class" id="class" class="{{$selclass}}">
                <option value="{{$class}}">Current: {{$class}}</option>
                <option value="AM">AM</option>
                <option value="A1">A1</option>
                <option value="A2">A2</option>
                <option value="A">A</option>
                <option value="B1">B1</option>
                <option value="B">B</option>
                <option value="BE">BE</option>
                <option value="C1">C1</option>
                <option value="C1E">C1E</option>
                <option value="C">C</option>
                <option value="CE">CE</option>
                <option value="D1">D1</option>
                <option value="D1E">D1E</option>
                <option value="D">D</option>
                <option value="DE">DE</option>
                <option value="T">T</option>
            </select>
        </span>
        <span class="{{$sclass}}">Length:
            <select name="length" id="length" class="{{$selclass}}">
                <option value="{{$length}}">Current: {{$length}}</option>
                <option value="Classic">Classic (2-4 months)</option>
                <option value="Turbo">Turbo (1-2 months)</option>
            </select>
        </span>
        <span class="{{$sclass}}">Status:
            <select name="status" id="status" class="{{$selclass}}">
                <option value="{{$status}}">Current: {{$status}}</option>
                <option value="Open">Open</option>
                <option value="Active">Active</option>
                <option value="Finished">Finished</option>
            </select>
        </span>
        <span class="{{$sclass}}">Season:
            <select name="season" id="season" class="{{$selclass}}">
                <option value="{{$season}}">Current: {{$season}}</option>
                <option value="Spring">Spring</option>
                <option value="Summer">Summer</option>
                <option value="Autumn">Autumn</option>
                <option value="Winter">Winter</option>
            </select>
        </span>
        <button type="submit" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white dark:hover:bg-m-darkblue p-2 rounded-lg duration-300 transition-all ease-linear">Update</button>
    </form>
    <div class="flex flex-col justify-end">
        <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('progress')}}"">
            <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    Back
                </span>
        </a>
    </div>
</div>