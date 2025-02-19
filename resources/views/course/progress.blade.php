@extends('structures.main')
@section('title', ''.__('title.progress').'')
@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-12 px-4 md:px-8">
    @if($user->role == 'Admin')
        <section id="left" class="space-y-6">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear-all">{{__('courses.courses')}}:</h1>
            @if($courses->isEmpty())
                <p class="text-lg text-center text-gray-800 dark:text-gray-200">{{__('courses.no-courses-click')}} <span class="italic">{{__('courses.course-create')}}</span> </p>
            @endif
            @foreach($courses as $course)
                <x-course-div 
                :name="$course->name" 
                :teacher="$course->teacher->f_name.' '.$course->teacher->l_name" 
                :description="$course->description" 
                :class="$course->class" 
                :length="$course->length" 
                :status="$course->status" 
                :season="$course->season"
                :students="$course->students"
                :divclass="''" :hclass="''" :tclass="''" 
                :id="$course->id"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :course="$course"
                />                
            @endforeach
            <div class="flex flex-row justify-center items-center">
                <a href="{{route('course.create')}}" class="block h-12 w-48 text-center dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition-all duration-300 ease-linear">{{__('courses.course-create')}}</a>       
            </div>
        </section>

        <section id="right" class="space-y-6">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear-all">{{__('courses.forms')}}:</h1>
            @if($forms->isEmpty())
                <p class="text-lg text-center text-gray-800 dark:text-gray-200">{{__('courses.no-forms-click')}} <span class="italic">{{__('courses.form-create')}}</span></p>
            @endif
            @foreach($forms as $form)
                <x-form-div 
                :courseid="''" :divclass="''" :formid="''"
                :fname="$form->f_name" 
                :lname="$form->l_name" 
                :email="$form->email" 
                :birthday="$form->birthday" 
                :length="$form->length" 
                :class="$form->class" 
                :season="$form->season" 
                :reason="$form->reason" 
                :id="$form->id"
                :approval="$form->approval"
                :hclass="'dark:text-white text-m-blue'" 
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"></x-form-div>
            @endforeach
            <div class="flex flex-row justify-center items-center">
                <a href="{{route('course.form')}}" class="block h-12 w-48 text-center dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition-all duration-300 ease-linear">{{__('courses.form-create')}}</a>       
            </div>
        </section>
    @endif

    @if($user->role == 'Teacher')
        <section id="left" class="space-y-6">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear-all">{{__('courses.courses')}}:</h1>
            @if($courses->isEmpty())
                <p class="text-lg text-center text-gray-800 dark:text-gray-200">{{__('courses.no-courses-click')}} <span class="italic">{{__('courses.course-create')}}</span> </p>
            @endif
            @foreach($courses as $course)
                <x-course-div 
                :name="$course->name" 
                :teacher="$course->teacher->f_name.' '.$course->teacher->l_name" 
                :description="$course->description"
                :class="$course->class" 
                :length="$course->length" 
                :status="$course->status" 
                :season="$course->season"
                :students="$course->students"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'" 
                :id="$course->id"
                :divclass="''" :hclass="''" :tclass="''" 
                :course="$course"
                />                
            @endforeach
            <div class="flex flex-row justify-center items-center">
                <a href="{{route('course.create')}}" class="block h-12 w-48 text-center dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition-all duration-300 ease-linear">{{__('courses.course-create')}}</a>       
            </div>        
        </section>
        <section id="right" class="space-y-6">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear-all">{{__('courses.forms')}}:</h1>
            @if($forms->isEmpty())
                <p class="text-lg text-center text-gray-800 dark:text-gray-200">{{__('courses.no-forms')}} {{__('courses.no-forms-wait')}} {{__('courses.no-forms-teacher')}}</p>
            @endif
            @foreach($forms as $form)
                <x-form-div 
                :fname="$form->f_name" 
                :lname="$form->l_name" 
                :email="$form->email" 
                :birthday="$form->birthday" 
                :length="$form->length" 
                :class="$form->class" 
                :season="$form->season" 
                :reason="$form->reason" 
                :id="$form->id"
                :courseid="''" :divclass="''" :formid="''" 
                :approval="$form->approval"
                :hclass="'text-m-blue dark:text-white'"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'" />
            @endforeach
        </section>
    @endif

    @if($user->role == 'Student' || $user->role == 'User')
        <section id="left" class="space-y-6">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear-all">{{__('courses.courses')}}:</h1>
            @if($courses->isEmpty())
                <p class="text-lg text-center text-gray-800 dark:text-gray-200">{{__('courses.no-courses-student')}}</p>
            @endif
            @foreach($courses as $course)
                <x-course-div 
                :name="$course->course->name" 
                :teacher="$course->course->teacher_id" 
                :description="$course->course->description" 
                :class="$course->course->class" 
                :length="$course->course->length" 
                :status="$course->course->status" 
                :season="$course->course->season"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :id="$course->id"
                :divclass="''" :hclass="''" :tclass="''"
                :course="$course->course"/>                
            @endforeach
        </section>

        <section id="right" class="space-y-6">
            <h1 class="text-2xl text-center underline font-bold text-gray-800 dark:text-gray-200 transition-all duration-300 ease-linear-all">{{__('courses.forms')}}:</h1>
            @if($forms->isEmpty())
                <p class="text-lg text-center text-gray-800 dark:text-gray-200">{{__('courses.no-forms-student')}}</p>
            @endif
            @foreach($forms as $form)
                <x-form-div
                :courseid="''" :divclass="''" :formid="''" 
                :fname="$form->f_name" 
                :lname="$form->l_name" 
                :email="$form->email" 
                :birthday="$form->birthday" 
                :length="$form->length" 
                :class="$form->class" 
                :season="$form->season" 
                :reason="$form->reason" 
                :id="$form->id"
                :hclass="'text-m-blue dark:text-white'"
                :pclass="'dark:text-white text-m-blue'"
                :sclass="'dark:text-m-blue text-gray-900'"
                :approval="$form->approval"></x-form-div>
            @endforeach
            <div class="flex flex-row justify-center items-center">
                <a href="{{route('course.form')}}" class="block h-12 w-48 text-center dark:bg-m-blue dark:text-white bg-m-blue text-gray-900 hover:bg-m-red hover:text-white py-3 px-6 rounded-lg font-bold dark:hover:bg-m-darkblue transition-all duration-300 ease-linear">{{__('courses.form-create')}}</a>       
            </div>
        </section>
    @endif
</div>
@endsection
