@extends('structures.main')
@section('content')
    {{--User
    Student
    Teacher
    Admin
    le users: (vsetko z db + na konci delete a edit)
    nejak pekne to upravit a pujde to--}}
    <div class="p-6">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-start">Users</span>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-end">Filters:</h1>            
        </div>
            <div id="mails" class="flex flex-col divide-y divide-gray-300 dark:divide-gray-800 bg-white dark:bg-gray-900 rounded-lg shadow-md transition-all duration-300 ease-linear">
                <x-user-div :id="'User ID:'" :fname="'First Name:'" :lname="'Last Name:'" :role="'Role:'" :birthday="'Date of Birth:'" :telnum="'Telephone Number:'" :email="'Email'" :sclass="'font-medium text-sm text-gray-700 dark:text-gray-300 truncate'" :iclass="'bi bi-trash text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500'" />
                @foreach ($accounts as $account)
                    <?php 
                        $gradient = match ($account->role) {
                            'Admin' => 'to-red-500',
                            'Teacher' => 'to-blue-500',
                            'Student' => 'to-green-500',
                            'User' => 'to-yellow-500',
                            default => 'to-gray-500', // Fallback gradient
                        };
                    ?>
                    <x-user-div 
                    :id="$account->id"
                    :fname="$account->f_name"
                    :lname="$account->l_name"
                    :role="$account->role"
                    :birthday="$account->birthday"
                    :telnum="$account->tel_number"
                    :email="$account->email"
                    :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                    :iclass="'bi bi-trash text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500'"
                    :gradient="$gradient"
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