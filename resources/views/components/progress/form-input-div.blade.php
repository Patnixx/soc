<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<div class="container mx-auto max-w-[70%] rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear"> 
    <!-- Heading -->
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">{{__('courses.form-edit')}}:</h2>

    <!-- Form Section -->
    <form method="POST" action="{{route('form.update', $id)}}" class="grid grid-cols-2 gap-6 mb-6">
        @csrf
        <div class="left">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="f_name" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.f-name')}}</label>
                <input 
                    type="text" 
                    name="f_name" 
                    id="f_name" 
                    placeholder={{__('courses.f-name')}}
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300"
                    value="{{$fname}}">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="l_name" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.l-name')}}</label>
                <input 
                    type="text" 
                    name="l_name" 
                    id="l_name" 
                    placeholder={{__('courses.l-name')}} 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300"
                    value="{{$lname}}">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="email" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.email')}}</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder={{__('courses.email')}}
                    value="{{$email}}" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="birthday" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.birth')}}</label>
                <input 
                    type="date" 
                    name="birthday" 
                    id="birthday" 
                    placeholder={{__('courses.birth')}}
                    value="{{$birthday}}"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="approval" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.approval')}}</label>
                <select name="approval" id="approval" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$approval}}">{{__('courses.current')}}: {{$approval}}</option>
                    <option value="Approved">{{__('courses.approved')}}</option>
                    <option value="Waiting">{{__('courses.waiting')}}</option>
                    <option value="Rejected">{{__('courses.rejected')}}</option>
                </select>
            </div>
        </div>
        <div class="right">
            <div class="flex flex-col space-y-2  mb-2">
                <label for="season" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.season')}}</label>
                <select name="season" id="season" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$season}}">{{__('courses.current')}}: {{$season}}</option>
                    <option value="Spring">{{__('courses.spring')}}</option>
                    <option value="Summer">{{__('courses.summer')}}</option>
                    <option value="Autumn">{{__('courses.autumn')}}</option>
                    <option value="Winter">{{__('courses.winter')}}</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="length" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.length')}}</label>
                <select name="length" id="length" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$length}}">{{__('courses.current')}}: {{$length}}</option>
                    <option value="Classic">{{__('courses.classic')}}</option>
                    <option value="Turbo">{{__('courses.turbo')}}</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="class" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.class')}}</label>
                <select name="class" id="class" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$class}}">{{__('courses.current')}}: {{$class}}</option>
                    {{--<option value="A1">A1</option>
                    <option value="A2">A2</option>--}}
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="reason" class="text-sm font-medium dark:text-white text-gray-900">{{__('courses.reason')}}</label>
                <textarea 
                    name="reason" 
                    id="reason" 
                    placeholder={{__('courses.reason')}}
                    class="w-full h-30.5 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none">{{$reason}}</textarea>
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-floppy"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.save')}}
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