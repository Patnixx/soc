<div class="flex">
    <div x-data="{ open: true }">
        <div class="fixed top-0 left-0 h-full w-16 bg-white dark:bg-gray-900 text-white shadow-lg transition-transform duration-300 ease-in-out"
            :class="{ '-translate-x-full': open === false }">
            <div class="flex flex-col md:justify-between h-full pt-6 overflow-scroll md:overflow-visible">
                <div class="flex flex-col items-center justify-center justify-self-start">
                    <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'/'" :sclass="'left-14'"/>        
                    @if(Auth::check() && $user->role == 'Admin')
                        <x-auth-icon-div :icon="'bi bi-gear'" :text="'admin'" :route="'/admin'"/>
                    @endif
                    @if(Auth::check() && $user->role == 'Student')    
                        <x-auth-icon-div :icon="'bi bi-car-front'" :text="'progress'" :route="'/progress'"/>
                        <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'calendar'" :route="'/events'"/>
                        <x-auth-icon-div :icon="'bi bi-journal'" :text="'materials'" :route="'materials'"/>
                        <x-mail-icon-div :icon="'bi bi-envelope'" :text="'inbox'" :route="'inbox'" :unread="''.$unread.''"/>
                    @endif
                    @if(Auth::check() && $user->role == 'Teacher')
                        <x-auth-icon-div :icon="'bi bi-car-front'" :text="'courses'" :route="'/progress'"/>
                        <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'calendar'" :route="'/events'"/>
                        <x-auth-icon-div :icon="'bi bi-journal'" :text="'materials'" :route="'materials'"/>
                        <x-mail-icon-div :icon="'bi bi-envelope'" :text="'inbox'" :route="'inbox'" :unread="''.$unread.''"/>
                    @endif
                    @if(Auth::check() && $user->role == 'User')
                        <x-auth-icon-div :icon="'bi bi-car-front'" :text="'progress'" :route="'/progress'"/>
                        <x-mail-icon-div :icon="'bi bi-envelope'" :text="'inbox'" :route="'inbox'" :unread="''.$unread.''"/>
                    @endif
                </div>
                <div class="flex flex-col items-center justify-center justify-self-end">
                    <div class="mt-auto mb-6">
                        @if(!Auth::check())
                            <x-icon-div :icon="'bi bi-person-fill-up'" :text="'login'" :route="'login'" :sclass="'left-14'"/>
                            <x-icon-div :icon="'bi bi-person-plus-fill'" :text="'register'" :route="'register'" :sclass="'left-14'"/>
                        @endif
                        @if(Auth::check())
                            @if($user->role != 'Admin')
                            <x-icon-div :icon="'bi bi-person-fill-gear'" :text="'profile'" :route="'profile'" :sclass="'left-14'"/>
                            @endif
                            <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'logout'" :route="'logout'" :sclass="'left-14'"/>
                        @endif
                        <x-theme-div :spanSide="'left-14'"/>
                    </div>
                </div>
            </div>
        </div>
        <button @click="open = !open" class="fixed top-4 right-4 w-12 h-12 rounded-full bg-m-blue text-gray-900 hover:bg-m-red hover:text-white dark:bg-gray-900 dark:text-m-blue dark:hover:bg-m-darkblue dark:hover:text-white flex items-center justify-center shadow-lg transition-all duration-300 ease-linear">
            <i class="bi bi-list text-2xl"></i>
        </button>
    </div>        
</div>