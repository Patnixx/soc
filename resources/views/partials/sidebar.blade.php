
    <div class="flex">
        <div class="fixed top-0 left-0 h-screen w-16 m-0 flex flex-col justify-between bg-gray-900 text-white shadow-lg">
            <div class="justify-self-start">
                <x-icon-div :icon="'bi bi-house'" :text="'Home'" :route="'#'"/>
                <x-icon-div :icon="'bi bi-fire'" :text="'Fire'" :route="'#'"/>
                <x-icon-div :icon="'bi bi-apple'" :text="'Apple'" :route="'#'"/>
                <x-icon-div :icon="'bi bi-lightning'" :text="'Lightning'" :route="'#'"/>
                <x-icon-div :icon="'bi- bi-android'" :text="'Android'" :route="'#'"/>
            </div>
            <div class="justify-self-end">
                @if(!(Auth::check()))
                <x-icon-div :icon="'bi bi-person-fill-up'" :text="'Login'" :route="'login'"/>
                <x-icon-div :icon="'bi bi-person-plus-fill'" :text="'Register'" :route="'#'"/>
                @else
                <x-icon-div :icon="'bi bi-person-fill-gear'" :text="'Profile'" :route="'#'"/>
                @endif
            </div>
            
        </div>
    </div>