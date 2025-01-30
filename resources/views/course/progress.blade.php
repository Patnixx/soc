@extends('structures.main')
@section('title', ''.__('title.progress').'')
@section('content')
<div class="grid grid-cols-[1fr,1fr] my-12">
    @if($user->role == 'Admin')
        <section id="left">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('courses.courses')}}:</h1>
            @if($courses->isEmpty())
                <h1 class="text-lg text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear block">{{__('courses.no-courses')}}<a class="underline" href="{{route('course.create')}}">{{__('courses.no-courses-link')}}.</a></h1>
            @endif
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
            @endforeach
            <a href="{{route('course.create')}}" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 ease-linear">{{__('courses.course-create')}}</a>       
        </section>
        <section id="right">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('courses.forms')}}:</h1>
            @if($forms->isEmpty())
                <h1 class="text-lg text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear block">{{__('courses.no-forms-click')}}<span class="italic">{{__('courses.form-create')}}</span></h1>
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
                :courseid="''" :divclass="''" :formid="''"
                :hclass="'dark:text-white text-m-blue'" 
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :approval="''.$form->approval.''"></x-form-div>
            @endforeach
            <a href="{{route('course.form')}}" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 ease-linear">{{__('courses.form-create')}}</a>       
        </section>
    @endif

    @if($user->role == 'Teacher')
        <section id="left">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('courses.courses')}}:</h1>
            @if($courses->isEmpty())
                <h1 class="text-lg text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear block ">{{__('courses.no-courses')}}<a class="underline" href="{{route('course.create')}}">{{__('courses.no-courses-link')}}.</a></h1>
            @endif
            @foreach($courses as $course)
                <x-course-div 
                :name="''.$course->name.''" 
                :teacher="''.$course->teacher->f_name.' '.$course->teacher->l_name.''" 
                :description="''.$course->description.''"
                :class="''.$course->class.''" 
                :length="''.$course->length.''" 
                :status="''.$course->status.''" 
                :season="''.$course->season.''"
                :students="''.$course->students.''"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'" 
                :id="''.$course->id.''"/>                
            @endforeach
            <a href="{{route('course.create')}}" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 ease-linear">{{__('courses.course-create')}}</a>
        </section>
        <section id="right">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('courses.forms')}}:</h1>
            @if($forms->isEmpty())
                <h1 class="text-lg text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear block">{{__('courses.no-forms')}} {{__('courses.no-forms-wait')}}{{__('courses.no-forms-teacher')}}</h1>
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
                :courseid="''" :formid="''" :divclass="''"
                :approval="''.$form->approval.''"
                :hclass="'text-m-blue dark:text-white'"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'" />
            @endforeach
        </section>
    @endif

    @if($user->role == 'Student')
        <section id="left">
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('courses.courses')}}:</h1>
            @if($courses->isEmpty())
                <h1 class="text-lg text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear block">{{__('courses.no-courses-student')}}</h1>
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
            <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear">{{__('courses.forms')}}:</h1>
            @if($forms->isEmpty())
                <h1 class="text-lg text-gray-800 dark:text-gray-200 mb-4 transition-all duration-300 ease-linear block">{{__('courses.no-forms-student')}}</h1>
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
                :courseid="''" :formid="''" :divclass="''"
                :hclass="'text-m-blue dark:text-white'"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :approval="''.$form->approval.''"></x-form-div>
            @endforeach
            <a href="{{route('course.form')}}" class="dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition duration-300 ease-linear">{{__('courses.form-create')}}</a>       
        </section>
    @endif
</div>
@endsection
