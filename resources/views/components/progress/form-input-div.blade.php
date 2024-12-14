<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
<div class="container mx-auto max-w-[70%] rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear"> 
    <!-- Heading -->
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">Edit Form:</h2>

    <!-- Form Section -->
    <form method="POST" action="{{route('form.update', $id)}}" class="grid grid-cols-2 gap-6 mb-6">
        @csrf
        <div class="left">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="f_name" class="text-sm font-medium dark:text-white text-gray-900">First Name</label>
                <input 
                    type="text" 
                    name="f_name" 
                    id="f_name" 
                    placeholder="{{$fname}}" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300"
                    value="{{$fname}}">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="l_name" class="text-sm font-medium dark:text-white text-gray-900">Last Name</label>
                <input 
                    type="text" 
                    name="l_name" 
                    id="l_name" 
                    placeholder="{{$lname}}" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300"
                    value="{{$lname}}">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="email" class="text-sm font-medium dark:text-white text-gray-900">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="{{$email}}"
                    value="{{$email}}" 
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="birthday" class="text-sm font-medium dark:text-white text-gray-900">Date of birth</label>
                <input 
                    type="date" 
                    name="birthday" 
                    id="birthday" 
                    placeholder="{{$birthday}}"
                    value="{{$birthday}}"
                    class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="approval" class="text-sm font-medium dark:text-white text-gray-900">Approval</label>
                <select name="approval" id="approval" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$approval}}">Current: {{$approval}}</option>
                    <option value="Approved">Approved</option>
                    <option value="Waiting">Waiting</option>
                    <option value="Rejected">Rejected</option>
                </select>
            </div>
        </div>
        <div class="right">
            <div class="flex flex-col space-y-2  mb-2">
                <label for="season" class="text-sm font-medium dark:text-white text-gray-900">Season</label>
                <select name="season" id="season" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$season}}">Current: {{$season}}</option>
                    <option value="Spring">Spring</option>
                    <option value="Summer">Summer</option>
                    <option value="Autumn">Autumn</option>
                    <option value="Winter">Winter</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="length" class="text-sm font-medium dark:text-white text-gray-900">Length</label>
                <select name="length" id="length" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
                    <option value="{{$length}}">Current: {{$length}}</option>
                    <option value="Classic">Classic (2-4 months)</option>
                    <option value="Turbo">Turbo (1-2 months)</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="class" class="text-sm font-medium dark:text-white text-gray-900">Class</label>
                <select name="class" id="class" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
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
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="reason" class="text-sm font-medium dark:text-white text-gray-900">Reason</label>
                <textarea 
                    name="reason" 
                    id="reason" 
                    placeholder="{{$reason}}"
                    class="w-full h-30.5 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 resize-none">{{$reason}}</textarea>
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-floppy"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    Update
                </span>
            </button>
            <a href="{{route('progress')}}" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    Back
                </span>
            </a>
        </div>
    </form>
</div>