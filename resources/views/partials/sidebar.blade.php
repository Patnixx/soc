    <div class="flex">
        <div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col justify-between bg-gray-900 text-white shadow-lg">
            <div class="justify-self-start">
                <!-- //NOTE - Upper sidebar icons -->
                @if(!((Auth::check()) && $user->role == 'Admin'))
                    <x-icon-div :icon="'bi bi-house'" :text="'Home'" :route="'/'"/>
                    <x-icon-div :icon="'bi bi-fire'" :text="'Fire'" :route="'#'"/>
                    <x-icon-div :icon="'bi bi-apple'" :text="'Apple'" :route="'#'"/>
                    <x-icon-div :icon="'bi bi-lightning'" :text="'Lightning'" :route="'#'"/>
                    <x-icon-div :icon="'bi- bi-android'" :text="'Android'" :route="'#'"/>
                @endif
                @if((Auth::check()) && $user->role == 'Admin')
                    <x-icon-div :icon="'bi bi-person'" :text="'Users'" :route="'#'"/>
                    <x-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'#'"/>
                    <x-icon-div :icon="'bi bi-book'" :text="'Courses'" :route="'#'"/>
                    <x-icon-div :icon="'bi bi-journal'" :text="'Materials'" :route="'#'"/>
                @endif

                <!-- //NOTE - Middle sidebar icons -->
                @if(Auth::check() && $user->role == 'Student')
                    <br>
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'Progress'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'Inbox'" :route="'/'"/>
                @endif
                @if(Auth::check() && $user->role == 'Teacher')
                    <br>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-book'" :text="'Courses'" :route="'#'"/>
                    <x-auth-icon-div :icon="'bi bi-journal'" :text="'Materials'" :route="'#'"/>
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'Progress'" :route="'/'"/>
                @endif
            </div>
            <div class="justify-self-end">
                <!-- //NOTE - Lower sidebar icons -->
                @if((!Auth::check()))
                    <x-icon-div :icon="'bi bi-person-fill-up'" :text="'Login'" :route="'login'"/>
                    <x-icon-div :icon="'bi bi-person-plus-fill'" :text="'Register'" :route="'register'"/>
                @endif
                @if(((Auth::check()) && $user->role == 'Admin'))
                    <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'Log out'" :route="'logout'"></x-icon-div>
                @endif
                @if(Auth::check() && $user->role != 'Admin')
                    <x-icon-div :icon="'bi bi-person-fill-gear'" :text="''.$profile" :route="'#'"/>
                    <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'Log out'" :route="'logout'"></x-icon-div>
                @endif
            </div>
            
        </div>
    </div>