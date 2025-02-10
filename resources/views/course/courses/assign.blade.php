@extends('structures.main')
@section('title', ''.__('title.course-assign').'')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-12">
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
@endsection
