    <div class="flex">
        <div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col justify-between bg-gray-900 text-white shadow-lg">
            <div class="justify-self-start">
                <x-icon-div :icon="'bi bi-house'" :text="'Home'" :route="'/'"/>
                <x-icon-div :icon="'bi bi-fire'" :text="'Fire'" :route="'#'"/>
                <x-icon-div :icon="'bi bi-apple'" :text="'Apple'" :route="'#'"/>
                <x-icon-div :icon="'bi bi-lightning'" :text="'Lightning'" :route="'#'"/>
                <x-icon-div :icon="'bi- bi-android'" :text="'Android'" :route="'#'"/>
                @if(Auth::check() && $user->role != 'Admin')
                    <br>
                    <x-auth-icon-div :icon="'bi bi-car-front'" :text="'Progress'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-calendar-check'" :text="'Calendar'" :route="'/'"/>
                    <x-auth-icon-div :icon="'bi bi-envelope'" :text="'Inbox'" :route="'/'"/>
                @endif
            </div>
            <div class="justify-self-end">
                @if((!Auth::check()))
                <x-icon-div :icon="'bi bi-person-fill-up'" :text="'Login'" :route="'login'"/>
                <x-icon-div :icon="'bi bi-person-plus-fill'" :text="'Register'" :route="'register'"/>
                @else
                <x-icon-div :icon="'bi bi-person-fill-gear'" :text="''.$profile" :route="'#'"/>
                {{--<x-icon-div :icon="'bi bi-box-arrow-right'" :text="'Log Out'" :route="'logout'"/> --}}
                <x-icon-div :icon="'bi bi-box-arrow-right'" :text="'Log out'" :route="'logout'"></x-icon-div>
                @endif
            </div>
            
        </div>
    </div>