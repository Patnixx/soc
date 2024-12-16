@extends('structures.main')
@section('content')
    <div class="p-6">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-start">Users</h1>
            <div class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-end flex flex-row space-x-2 mr-2">
                <button data-role="All" type="button" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">All</button>
                <button data-role="Admin" type="button" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">Admin</button>
                <button data-role="Teacher" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">Teacher</button>
                <button data-role="Student" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">Student</button>
                <button data-role="User" class="filter-btn dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white rounded-lg px-4 text-base transition-all duration-300 ease-linear">User</button>
            </div>            
        </div>
            <div id="userList" class="flex flex-col divide-y divide-gray-300 dark:divide-gray-800 bg-white dark:bg-gray-900 rounded-lg shadow-md transition-all duration-300 ease-linear">
                <x-user-div :id="'User ID:'" :fname="'First Name:'" :lname="'Last Name:'" :role="'Role:'" :birthday="'Date of Birth:'" :telnum="'Telephone Number:'" :email="'Email:'" :sclass="'font-medium text-sm text-gray-700 dark:text-gray-300 truncate'" :iclass="'hidden'" :aclass="''" />
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
                :text="'New User'"
                :class="'justify-self-start'"
                :sclass="'right-14'"
                />
            </div>
        </div>
    </div>
</div>

@endsection