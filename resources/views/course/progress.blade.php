@extends('structures.main')
@section('content')
<div class="grid grid-cols-[1fr,1fr]">
    @if($user->role == 'Admin')
        <section id="left">
            <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">Courses</h1>
            @if($courses->isEmpty())
                <h1 class="text-red-500 dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear rounded-md inline-block">No courses found</h1>
            @endif
            <a class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-14 px-4 py-2 rounded-md inline-block" href="{{route('course.create')}}">Vytvoriť kurz</a>
            @foreach($courses as $course)
                <x-course-div 
                :name="''.$course->name.''" 
                :teacher="''.$course->teacher->f_name.' '.$course->teacher->l_name.''" 
                :description="''.$course->description.''" 
                :class="''.$course->class.''" 
                :length="''.$course->length.''" 
                :status="''.$course->status.''" 
                :season="''.$course->season.''" 
                :id="''.$course->id.''"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                />                
            @endforeach        </section>
        <section id="right">
            <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">Forms</h1>
            @if($forms->isEmpty())
                <h1 class="text-red-500 dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear rounded-md inline-block">No forms found</h1>
            @endif
            <a class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-14 px-4 py-2 rounded-md inline-block" href="{{route('course.form')}}">Send form</a>
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
                :id="''.$form->id.''"
                :courseid="''" :divclass="''" :formid="''"
                :hclass="'dark:text-white text-m-blue'" 
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :approval="''.$form->approval.''"></x-form-div>
            @endforeach
        </section>
    @endif

    @if($user->role == 'Teacher')
        <section id="left">
            <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">My Courses</h1>
            @if($courses->isEmpty())
                <h1 class="text-red-500 text-xl dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear rounded-md inline-block">No courses</h1>
            @endif
            @foreach($courses as $course)
                <x-course-div 
                :name="''.$course->name.''" 
                :teacher="''.$course->teacher_id.''" 
                :description="''.$course->description.''"
                :class="''.$course->class.''" 
                :length="''.$course->length.''" 
                :status="''.$course->status.''" 
                :season="''.$course->season.''"course->students.''"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'" 
                :id="''.$course->id.''"/>                
            @endforeach        </section>
        <section id="right">
            <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">Forms</h1>
            @if($forms->isEmpty())
                <h1 class="text-red-500 dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear rounded-md inline-block">No forms found</h1>
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
                :id="''.$form->id.''" 
                :approval="''.$form->approval.''"
                :hclass="'text-m-blue dark:text-white'"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'" />
            @endforeach
            @if($user->role == 'Student')
                <a class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear hover:underline ml-14" href="{{route('course.form')}}">Send form</a>
            @endif
        </section>
    @endif

    @if($user->role == 'Student')
        <section id="left">
            <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">My Courses</h1>
            @if($courses->isEmpty())
                <h1 class="text-red-500 dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear rounded-md inline-block">No courses</h1>
            @endif
            @foreach($courses as $course)
                <x-course-div 
                :name="''.$course->course->name.''" 
                :teacher="''.$course->course->teacher_id.''" 
                :description="''.$course->course->description.''" 
                :class="''.$course->course->class.''" 
                :length="''.$course->course->length.''" 
                :status="''.$course->course->status.''" 
                :season="''.$course->course->season.''"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :id="''.$course->id.''"/>                
            @endforeach
        </section>
        <section id="right">
            <h1 class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear ml-12 px-4 py-2 rounded-md inline-block">My Forms</h1>
            @if($forms->isEmpty())
                <h1 class="text-red-500 dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear rounded-md inline-block">No forms found</h1>
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
                :id="''.$form->id.''"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :approval="''.$form->approval.''"></x-form-div>
            @endforeach
            @if($user->role == 'Student')
                <a class="text-m-blue dark:text-white bg-white dark:bg-gray-900 transition-all duration-300 ease-linear hover:underline ml-14" href="{{route('course.form')}}">Send form</a>
            @endif
        </section>
    @endif
</div>
@endsection
