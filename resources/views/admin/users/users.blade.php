@extends('structures.main')
@section('title', ''.__('title.users').'')
@section('content')
    <div class="p-6 m-12">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-start">{{__('users.users')}}</h1>
            <div class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-end flex flex-row space-x-2 mr-2">
                <button data-role="All" type="button" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">{{__('users.all')}}</button>
                <button data-role="Admin" type="button" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">{{__('users.admin')}}</button>
                <button data-role="Teacher" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">{{__('users.teacher')}}</button>
                <button data-role="Student" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">{{__('users.student')}}</button>
                <button data-role="User" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">{{__('users.user')}}</button>
            </div>            
        </div>
            <div id="userList" class="flex flex-col divide-y divide-gray-300 dark:divide-gray-800 bg-white dark:bg-gray-900 rounded-lg shadow-md transition-all duration-300 ease-linear">
                <a class="grid grid-cols-8 w-full h-auto px-4 py-2 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all bg-gradient-to-br from-transparent via-transparent">
                    <div class="flex items-center truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">#</span>
                    </div>
                    
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('users.f-name')}}</span>
                    </div>
                
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('users.l-name')}}</span>
                    </div>
                
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('users.role')}}</span>
                    </div>
                
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('users.birth')}}</span>
                    </div>
                
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('users.tel')}}</span>
                    </div>
                
                    <div class="flex items-center  text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('users.email')}}</span>
                    </div>
                
                    <div class="flex items-center justify-end text-sm truncate space-x-4">
                    </div>
                </a>                
                @foreach ($accounts as $account)
                    <x-user-div 
                    :id="$account->id"
                    :fname="$account->f_name"
                    :lname="$account->l_name"
                    :role="$account->role"
                    :birthday="$account->birthday"
                    :telnum="$account->tel_number"
                    :email="$account->email"
                    :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                    :iclass="'cursor-pointer'"
                    :aclass="'user-card'"
                    />
                @endforeach
            </div>
            <div class="mt-6 flex flex-row justify-end">
                <x-icon-div 
                :route="'users.create'"
                :icon="'bi bi-plus-circle'"
                :text="'create-usr'"
                :class="'justify-self-start'"
                :sclass="'right-14'"
                />
            </div>
            <br>
            {{$accounts->links()}}
        </div>
    </div>
</div>

@endsection