    <div class="flex">
        <div class="fixed top-0 left-0 h-screen sm:w-6 md:w-8 lg:w-10 xl:w-12 2xl:w-16 m-0 flex flex-col justify-between bg-white dark:bg-gray-900 duration-300 transition-all ease-linear shadow-lg">
            <div class="justify-self-start">
                <!-- //NOTE - Upper sidebar icons -->
                <x-icon-div :icon="'bi bi-house'" :text="'home'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                @if(!((Auth::check())))
                    <x-icon-div :icon="'bi bi-info-circle'" :text="'info'" :route="'#about'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-people'" :text="'personnel'" :route="'#personnel'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-car-front-fill'" :text="'cars'" :route="'#cars'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-telephone'" :text="'contact'" :route="'#contact'" :class="'mx-auto'" :sclass="'left-14'"/>
                @endif
                @if((Auth::check()) && $user->role == 'Admin')
                    <x-auth-icon-div :icon="'bi bi-gear'" :text="'admin'" :route="'/admin'"/>
                    <x-auth-icon-div :icon="'bi bi-person'" :text="'users'" :route="'users'"/>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-book'" :text="'courses'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-journal'" :text="'materials'" :route="'/'"/>
                @endif
                @if(Auth::check() && $user->role == 'Student')    
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'progress'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'inbox'" :route="'/inbox'"/>
                @endif
                @if(Auth::check() && $user->role == 'Teacher')
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'courses'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-journal'" :text="'materials'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'inbox'" :route="'/inbox'"/>
                @endif
                @if(Auth::check() && $user->role == 'User')
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'progress'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'inbox'" :route="'/inbox'"/>
                @endif
            </div>
                <!-- //NOTE - Middle sidebar icons -->
            <div class="justify-self-center">
            </div>
            <div class="justify-self-end">
                <!-- //NOTE - Lower sidebar icons -->
                @if((!Auth::check()))
                    <x-icon-div :icon="'bi bi-person-fill-up'" :text="'login'" :route="'login'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-person-plus-fill'" :text="'register'" :route="'register'" :class="'mx-auto'" :sclass="'left-14'"/>
                @endif
                @if(((Auth::check()) && $user->role == 'Admin'))
                    <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'logout'" :route="'logout'" :class="'mx-auto'" :sclass="'left-14'" />
                @endif
                @if(Auth::check() && $user->role != 'Admin')
                    <x-icon-div :icon="'bi bi-person-fill-gear'" :text="'profile'" :route="'profile'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'logout'" :route="'logout'" :class="'mx-auto'" :sclass="'left-14'" />
                @endif
                <x-theme-div :spanSide="'left-14'"/>
            </div>
            
        </div>
    </div>