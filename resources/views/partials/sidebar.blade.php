    <div class="flex">
        <div class="fixed top-0 left-0 h-screen sm:w-6 md:w-8 lg:w-10 xl:w-12 2xl:w-16 m-0 flex flex-col justify-between bg-white dark:bg-gray-900 duration-300 transition-all ease-linear shadow-lg">
            <div class="justify-self-start">
                <!-- //NOTE - Upper sidebar icons -->
                <x-icon-div :icon="'bi bi-house'" :text="'Home'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                @if(!((Auth::check())))
                    <x-icon-div :icon="'bi bi-info-circle'" :text="'Info'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-people'" :text="'Personel'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-car-front-fill'" :text="'Cars'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-images'" :text="'Gallery'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-telephone'" :text="'Contact'" :route="'/'" :class="'mx-auto'" :sclass="'left-14'"/>
                @endif
                @if((Auth::check()) && $user->role == 'Admin')
                    <x-auth-icon-div :icon="'bi bi-gear'" :text="'Admin'" :route="'/admin'"/>
                    <x-auth-icon-div :icon="'bi bi-person'" :text="'Users'" :route="'/users'"/>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-book'" :text="'Courses'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-journal'" :text="'Materials'" :route="'/'"/>
                @endif
                @if(Auth::check() && $user->role == 'Student')    
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'Progress'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'Inbox'" :route="'/inbox'"/>
                @endif
                @if(Auth::check() && $user->role == 'Teacher')
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'Courses'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-journal'" :text="'Materials'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'Inbox'" :route="'/inbox'"/>
                @endif
            </div>
                <!-- //NOTE - Middle sidebar icons -->
            <div class="justify-self-center">
                @if(Auth::check() && $user->role == 'User')
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'Progress'" :route="'/progress'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'Inbox'" :route="'/inbox'"/>
                @endif
            </div>
            <div class="justify-self-end">
                <!-- //NOTE - Lower sidebar icons -->
                @if((!Auth::check()))
                    <x-icon-div :icon="'bi bi-person-fill-up'" :text="'Login'" :route="'/login'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-person-plus-fill'" :text="'Register'" :route="'/register'" :class="'mx-auto'" :sclass="'left-14'"/>
                @endif
                @if(((Auth::check()) && $user->role == 'Admin'))
                    <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'Log out'" :route="'logout'" :class="'mx-auto'" :sclass="'left-14'" />
                @endif
                @if(Auth::check() && $user->role != 'Admin')
                    <x-icon-div :icon="'bi bi-person-fill-gear'" :text="''.$profile" :route="'/profile'" :class="'mx-auto'" :sclass="'left-14'"/>
                    <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'Log out'" :route="'logout'" :class="'mx-auto'" :sclass="'left-14'" />
                @endif
                <x-theme-div :spanSide="'left-14'"/>
            </div>
            
        </div>
    </div>