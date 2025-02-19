@extends('structures.main')
@section('title', ''.__('title.course-assign').'')
@section('content')
<div class="mt-12">
    <div class="">
        <h1 class="text-2xl ml-16 mb-10 transition-all duration-300 ease-linear"><a href="{{request()->routeIs('course.assign') ? '' : route('course.assign', ['id' => $course->id])}}" class="cursor-pointer {{request()->routeIs('course.assign') ? 'font-bold' : ''}} text-gray-800 dark:text-white hover:text-m-blue dark:hover:text-m-blue transition-all duration-300 ease-linear">{{ __('courses.assign') }}</a> / <a href="{{request()->routeIs('course.unassign') ? '' : route('course.unassign', ['id' => $course->id ])}}" class="cursor-pointer {{request()->routeIs('course.unassign') ? 'font-bold' : ''}} text-gray-800 dark:text-white hover:text-m-red dark:hover:text-m-red transition-all duration-300 ease-linear">{{ __('courses.unassign') }}</a></h1>
    </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <section id="left">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">
                {{__('courses.course-current')}}:
            </h1>
            <x-course-div 
            :name="''.$course->name.''" 
            :teacher="''.$course->teacher->f_name.' '.$course->teacher->l_name.''" 
            :description="''.$course->description.''" 
            :class="''.$course->class.''" 
            :length="''.$course->length.''" 
            :status="''.$course->status.''" 
            :season="''.$course->season.''" 
            :id="''.$course->id.''" 
            :students="''.$students.''"
            :pclass="'dark:text-white text-m-blue'"
            :sclass="'dark:text-m-blue text-gray-900'"
            :divclass="''" :hclass="''" :tclass="''"
            :course="$course"
            />
        </section>
        <section id="right">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">
                {{__('courses.forms')}}
            </h1>
            @if($forms->isEmpty())
                @if($user->role == 'Admin')
                    <h2 class="text-lg text-center text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear block">
                        {{__('courses.empty-forms')}}
                    </h2>
                @else
                    <h2 class="text-lg text-center text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear block">
                        {{__('courses.no-forms')}} {{__('courses.no-forms-wait')}}{{__('courses.no-forms-teacher')}}
                    </h2>
                @endif
            @endif
            <div class="space-y-4">
                @foreach($forms as $form)
                    <x-form-div 
                    :fname="''.$form->f_name.''" 
                    :lname="''.$form->l_name.''" 
                    :email="''.$form->email.''" 
                    :birthday="''.$form->birthday.''" 
                    :length="''.$form->length.''" 
                    :class="''.$form->class.''" 
                    :season="''.$form->season.''" 
                    :reason="''.$form->reason.''" 
                    :id="''.$form->user_id.''"
                    :formid="''.$form->id.''" 
                    :courseid="''.$course->id.''" 
                    :hclass="'text-m-blue dark:text-white'"
                    :pclass="'dark:text-white text-m-blue'"
                    :sclass="'dark:text-m-blue text-gray-900'"
                    :approval="''.$form->approval.''" 
                    :divclass="''"/>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
