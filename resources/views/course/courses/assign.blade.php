@extends('structures.main')
@section('content')
<div class="grid grid-cols-[1fr,1fr]">
    <section id="left">
        <h1 class="text-2xl ml-12 text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear w-min">Current_Course:</h1>
        <x-course-div 
        :name="''.$course->name.''" 
        :teacher="''.$course->teacher_id.''" 
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
        <h1 class="text-2xl ml-12 text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear w-min">Forms</h1>
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
            :courseid="''.$course->id.''" 
            :hclass="'text-m-blue dark:text-white'"
            :pclass="'dark:text-white text-m-blue'"
            :sclass="'dark:text-m-blue text-gray-900'"
            :approval="''.$form->approval.''" />
        @endforeach
    </section>
</div>
@endsection