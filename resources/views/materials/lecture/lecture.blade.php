@extends('structures.lecture')
@section('content')
    <div class="mt-12 col-start-2 w-full px-4 sm:px-8 md:px-12 lg:px-16 xl:px-20">
        @foreach($lectures as $lecture => $data)
            @foreach($data['parents'] as $parent)
                <div data-dropdown-content data-content-id="parent-{{ $parent->id }}" class="px-4 sm:px-8 pt-6 pb-8 mb-4 hidden">
                    <h1 class="pl-4 text-xl sm:text-2xl font-bold mb-4 dark:text-m-blue text-gray-900 transition-all duration-300 ease-linear">
                        {{ $parent->title }}
                    </h1>
                    @foreach($parent->children as $child)
                        <x-lecture-content-div 
                            :title="''.(($loop->index)+1).'. '.$child->title.''" 
                            :content="''.$child->content.''" 
                            :imgRoute="$child->img_name"
                            :image="true" 
                        />
                    @endforeach
                </div>
            @endforeach
        @endforeach
    </div>
@endsection
