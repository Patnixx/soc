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
    </div>
    <div class="flex flex-col justify-end">
        <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-green-500 hover:bg-green-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear cursor-pointer" href="{{$dtlroute}}""><i class="bi bi-filter-square"></i></a>
        <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-yellow-500 hover:bg-yellow-500 hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear cursor-pointer" href="{{$editroute}}""><i class="bi bi-pencil"></i></a>
        <form action="{{$delroute}}" method="POST" class="inline-block">
            @csrf
            <button class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-gray-800 text-m-red hover:bg-m-red hover:text-gray-800 rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear cursor-pointer" type="submit"><i class="bi bi-trash"></i></button>
        </form>
    </div>
</div>