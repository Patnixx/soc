<div class="w-64 h-full bg-white dark:bg-gray-900 text-white flex flex-col p-4 overflow-y-auto">
    <h2 class="text-2xl font-bold mb-4 dark:text-m-blue text-gray-900 transition-all duration-300 ease-linear">
        {{$section->title}}
    </h2>
    <div>
        @foreach($lectures as $elderId => $data)
            <div x-data="{ open: false }" class="mb-2">
                <button @click="open = !open" class="w-full flex justify-between items-center px-4 py-2 dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red bg-slate-200 rounded-md transition-all duration-300 ease-linear">
                    <span>{{ $data['elder']->title }}</span>
                    <svg :class="{'rotate-180': open}" class="w-4 h-4 transition-transform transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 9l6 6 6-6"></path>
                    </svg>
                </button>
                <div x-show="open" x-cloak class="pl-6 mt-2 space-y-1">
                    @foreach($data['parents'] as $parent)
                        <button data-dropdown-button data-target="parent-{{ $parent->id }}" class="w-full flex justify-between items-center px-4 py-2 dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red bg-slate-200 rounded-md transition-all duration-300 ease-linear mt-2">
                            <span>{{ $parent->title }}</span>
                        </button>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    <div class="btns flex flex-col justify-start items-start border-t-2 border-gray-900 dark:border-m-blue transition-all duration-300 ease-linear mt-4 pt-4">
        <div class="">
            @if($user->role == 'Admin' || $user->role == 'Teacher')
                <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-green-500 hover:bg-green-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('lecture.view', $syllab)}}"">
                    <i class="bi bi-filter-square"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('materials.all-lectures')}}
                    </span>
                </a>
            @endif
            <a class="relative flex items-center justify-center h-12 w-12 mt-2 mb-2 mx-auto shadow-lg bg-slate-200 dark:bg-gray-800 text-red-500 hover:bg-red-500 hover:text-gray-800 dark:hover:text-white rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer" href="{{route('materials')}}"">
                <i class="bi bi-box-arrow-right"></i>
                <span class="absolute w-auto p-2 m-2 min-w-max {{--right-14 /left-14 meni poziciu spanu--}} left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                    {{__('courses.back')}}
                </span>
            </a>
            <x-theme-div :spanSide="'left-14'"/>
        </div>
    </div>
</div>