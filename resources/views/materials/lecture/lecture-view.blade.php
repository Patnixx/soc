@extends('structures.main')
@section('title', ''.__('materials.themes', ['section' => $section->title]).'')
@section('content')
    <div class="p-6 m-12">
        <div class="flex flex-row justify-between">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear self-start">{{__('materials.themes', ['section' => $section->title])}}</h1>            
        </div>
            <div class="flex flex-col divide-y divide-gray-300 dark:divide-gray-800 bg-white dark:bg-gray-900 rounded-lg shadow-md transition-all duration-300 ease-linear">
                <a class="grid grid-cols-6 w-full h-auto px-4 py-2 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-all bg-gradient-to-br from-transparent via-transparent">
                    <div class="flex items-center truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">#</span>
                    </div>
                    
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('materials.main-theme')}}</span>
                    </div>

                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('materials.sub-theme')}}</span>
                    </div>
                
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('materials.theme-title')}}</span>
                    </div>
                
                    <div class="flex items-center text-sm truncate">
                        <span class="text-sm truncate font-medium text-gray-900 dark:text-white">{{__('materials.content')}}</span>
                    </div>
                
                    <div class="flex items-center justify-end text-sm truncate space-x-4">
                    </div>
                </a>              
                {{--@foreach ($lectures as $lecture => $data)
                    <x-lecture-view-div 
                    :id="$data['elder']->id"
                    :syllab="''.$syllab.''"
                    :elder="''.__('materials.is_main').''"
                    :parent="''"
                    :title="$data['elder']->title"
                    :content="$data['elder']->content"
                    :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                    :iclass="'cursor-pointer'"
                    :aclass="'user-card'"
                    />
                @endforeach
                
                @foreach($lectures as $lecture_child => $data_parent)
                    @foreach($data_parent['parents'] as $parent)
                        <x-lecture-view-div 
                        :id="$parent->id"
                        :syllab="''.$syllab.''"
                        :elder="''.$parent->elder_id.''"
                        :parent="''.__('materials.is_main').''"
                        :title="$parent->title"
                        :content="$parent->content"
                        :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                        :iclass="'cursor-pointer'"
                        :aclass="'user-card'"
                        />
                    @endforeach
                @endforeach
                @foreach($lectures as $lecture_child => $data_parent)
                    @foreach($data_parent['parents'] as $parent)
                        @foreach($parent->children as $child)
                            <x-lecture-view-div 
                            :id="$child->id"
                            :syllab="''.$syllab.''"
                            :elder="'X'"
                            :parent="$child->parent_id"
                            :title="$child->title"
                            :content="$child->content"
                            :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                            :iclass="'cursor-pointer'"
                            :aclass="'user-card'"
                            />
                        @endforeach
                    @endforeach
                @endforeach--}}
                @foreach($lectures as $lecture)
                    <?php if($lecture->elder_id == null)
                            {
                                $elder = "-->";
                            }
                            else {
                                $elder = $lecture->elder_id;
                            }
                            if($lecture->parent_id == null && $lecture->elder_id != null)
                            {
                                $parent = "-->";
                            }
                            else {
                                $parent = $lecture->parent_id;
                            }
                    ?>
                    <x-lecture-view-div 
                    :id="$lecture->id"
                    :syllab="''.$syllab.''"
                    :elder="$elder"
                    :parent="$parent"
                    :title="$lecture->title"
                    :content="$lecture->content"
                    :sclass="'text-sm text-gray-700 dark:text-gray-300 truncate'" 
                    :iclass="'cursor-pointer'"
                    :aclass="'user-card'"
                    />
                @endforeach
            </div>
            <br>
            {{$lectures->links()}}
            <div class="mt-6 flex flex-col md:flex-row justify-between">
                <a href="{{route('lecture', $syllab)}}" class="justify-self-start relative flex items-center justify-center sm:h-4 sm:w-4 md:w-6 md:h-6 lg:h-8 lg:w-8 xl:h-10 xl:w-10 2xl:h-12 2xl:w-12 mt-2 mb-2 shadow-lg dark:bg-gray-800 dark:text-m-red text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer bg-m-blue">
                    <i class="bi bi-box-arrow-left text-xl"></i>
                    <span class="absolute w-auto p-2 m-2 min-w-max left-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                        {{__('sidebar.back')}}
                    </span>
                </a>
                <div class="flex flex-col md:flex-row justify-end gap-2">
                    <a href="{{route('lecture.create', $syllab)}}" class="justify-self-start relative flex items-center justify-center sm:h-4 sm:w-4 md:w-6 md:h-6 lg:h-8 lg:w-8 xl:h-10 xl:w-10 2xl:h-12 2xl:w-12 mt-2 mb-2 shadow-lg dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer bg-m-blue">
                        <i class="bi bi bi-arrow-up text-xl"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max top-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('materials.add-main-theme')}}
                        </span>
                    </a>
                    <a href="{{route('sublecture.create', $syllab)}}" class="justify-self-start relative flex items-center justify-center sm:h-4 sm:w-4 md:w-6 md:h-6 lg:h-8 lg:w-8 xl:h-10 xl:w-10 2xl:h-12 2xl:w-12 mt-2 mb-2 shadow-lg dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer bg-m-blue">
                        <i class="bi bi-arrow-down text-xl"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max top-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('materials.add-sub-theme')}}
                        </span>
                    </a>
                    <a href="{{route('childlecture.create', $syllab)}}" class="justify-self-start relative flex items-center justify-center sm:h-4 sm:w-4 md:w-6 md:h-6 lg:h-8 lg:w-8 xl:h-10 xl:w-10 2xl:h-12 2xl:w-12 mt-2 mb-2 shadow-lg dark:bg-gray-800 dark:text-m-blue text-gray-900 dark:hover:bg-m-darkblue dark:hover:text-white hover:text-white hover:bg-m-red rounded-3xl hover:rounded-xl transition-all duration-300 ease-linear group cursor-pointer bg-m-blue">
                        <i class="bi bi-diagram-3-fill text-xl"></i>
                        <span class="absolute w-auto p-2 m-2 min-w-max top-14 rounded-md shadow-md text-white bg-gray-900 text-xs font-bold transition-all duration-100 scale-0 origin-left group-hover:scale-100">
                            {{__('materials.add-sub-theme')}}
                        </span>
                    </a>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection