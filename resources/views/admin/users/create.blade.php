@extends('structures.main')
@section('content')
<div class="container mx-auto max-w-[70%] rounded-lg shadow-lg bg-white dark:bg-gray-900 p-6 my-8 transition-all duration-300 ease-linear"> 
    <h2 class="text-2xl font-bold dark:text-white text-gray-900 mb-6">Create User:</h2>
    <form action="{{route('users.store')}}" method="POST" class="grid grid-cols-2 gap-6 mb-6">
        @csrf
        <div class="left">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="f_name" class="text-sm font-medium dark:text-white text-gray-900">First name</label>
                <input 
                    type="text" 
                    name="f_name" 
                    id="f_name"
                    placeholder="First Name"
                    required
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="l_name" class="text-sm font-medium dark:text-white text-gray-900">Last name</label>
                <input 
                    type="text" 
                    name="l_name" 
                    id="l_name"
                    placeholder="Last Name:"
                    required
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="email" class="text-sm font-medium dark:text-white text-gray-900">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email"
                    placeholder="Email"
                    required
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="birthday" class="text-sm font-medium dark:text-white text-gray-900">Birthday</label>
                <input 
                    type="date" 
                    name="birthday" 
                    id="birthday"
                    required
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
        </div>
        <div class="right">
            <div class="flex flex-col space-y-2 mb-2">
                <label for="telephone" class="text-sm font-medium dark:text-white text-gray-900">Telephone number</label>
                <input 
                    type="tel" 
                    name="telephone" 
                    id="telephone"
                    placeholder="0123 456 789"
                    pattern="[0-9]{4} [0-9]{3} [0-9]{3}"
                    required
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2  mb-2">
                <label for="role" class="text-sm font-medium dark:text-white text-gray-900">Role</label>
                <select name="role" id="role" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300 h-11" required>
                    <option value="User">User</option>
                    <option value="Student">Student</option>
                    <option value="Teacher">Teacher</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="pass" class="text-sm font-medium dark:text-white text-gray-900">Password (min. 8 characters)</label>
                <input 
                    type="password" 
                    name="pass" 
                    id="pass"
                    placeholder="Password"
                    required minlength="8"
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
            <div class="flex flex-col space-y-2 mb-2">
                <label for="c_pass" class="text-sm font-medium dark:text-white text-gray-900">Confirm Password (equals Password)</label>
                <input 
                    type="password" 
                    name="c_pass" 
                    id="c_pass"
                    placeholder="Confirm Password"
                    required minlength="8"
                    class="w-full h-11 px-4 py-2 border rounded-lg shadow-sm focus:ring focus:ring-blue-300">
            </div>
        </div>
        <div class="flex justify-center items-center space-x-4 col-span-2">
            <button type="submit" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-plus-circle"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max right-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    Create
                </span>
            </button>
            <a href="{{route('users')}}" class="relative flex items-center justify-center h-10 w-10 shadow-lg dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue dark:bg-gray-800 text-gray-900 hover:bg-m-red hover:text-white rounded-full transition-all duration-300 ease-linear group">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-300 scale-0 origin-left group-hover:scale-100">
                    Back
                </span>
            </a>
        </div>
    </form>
</div>
@endsection