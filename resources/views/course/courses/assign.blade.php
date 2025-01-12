@extends('structures.main')
@section('title', ''.__('title.course-assign').'')
@section('content')
<div class="grid grid-cols-[1fr,1fr]">
    <section id="left">
        <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">{{__('courses.course-current')}}:</h1>
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
        <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">{{__('courses.forms')}}</h1>
        @if($forms->isEmpty())
            <h2 class="text-m-blue dark:text-white text-start mt-8">{{__('courses.no-forms')}}</h2>
        @endif
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
    </section>
</div>
@endsection