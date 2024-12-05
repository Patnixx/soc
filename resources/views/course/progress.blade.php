@extends('structures.main')
@section('content')
<div class="grid grid-cols-[1fr,1fr]">
    @if($user->role == 'Admin')
        <section class="">
            <h1 class="text-m-blue bg-gray-900 ml-12 px-4 py-2 rounded-md inline-block">My Courses</h1>
            @if($courses->isEmpty())
                <h1 class="text-red-500">No courses found</h1>
            @endif
            @foreach($courses as $course)
                <x-course-div :name="''.$course->name.''" :teacher="''.$course->teacher_id.''" :description="''.$course->description.''" :class="''.$course->class.''" :length="''.$course->length.''" :status="''.$course->status.''" :season="''.$course->season.''" :dtlroute="'/'" :editroute="'/'" :delroute="'/'"/>                
            @endforeach
            <a class="text-blue-500 hover:underline ml-14" href="{{route('course.create')}}">Vytvoriť kurz</a>
        </section>
        <section class="">
            <h1 class="text-m-blue bg-gray-900 ml-12 px-4 py-2 rounded-md inline-block">My Forms</h1>
            @if($forms->isEmpty())
                <h1 class="text-red-500">No forms found</h1>
            @endif
            @foreach($forms as $form)
                <x-form-div :fname="''.$form->f_name.''" :lname="''.$form->l_name.''" :email="''.$form->email.''" :birthday="''.$form->birthday.''" :length="''.$form->length.''" :class="''.$form->class.''" :season="''.$form->season.''" :reason="''.$form->reason.''" :dtlroute="'/'" :editroute="'/'" :delroute="'/'"></x-form-div>
            @endforeach
            <a class="text-green-500 hover:underline ml-14" href="{{route('course.form')}}">Send form</a>
        </section>
    @endif

    @if($user->role == 'Teacher')
        <section class="">
            <h1 class="text-m-blue bg-gray-900 ml-12 px-4 py-2 rounded-md inline-block">My Courses</h1>
            @if($courses->isEmpty())
                <h1 class="text-red-500 text-xl">No courses</h1>
            @endif
            @foreach($courses as $course)
                <x-course-div :name="''.$course->name.''" :teacher="''.$course->teacher_id.''" :description="''.$course->description.''" :class="''.$course->class.''" :length="''.$course->length.''" :status="''.$course->status.''" :season="''.$course->season.''" :dtlroute="'/'" :editroute="'/'" :delroute="'/'"/>                
            @endforeach
            <a class="text-blue-500 hover:underline ml-14" href="{{route('course.create')}}">Vytvoriť kurz</a>
        </section>
    @endif

    @if($user->role == 'Student')
        <section class="">
            <h1 class="text-m-blue bg-gray-900 ml-12 px-4 py-2 rounded-md inline-block">My Courses</h1>
            @if($courses->isEmpty())
                <h1 class="text-red-500 text-xl">No courses</h1>
            @endif
            @foreach($courses as $course)
                <x-course-div :name="''.$course->course->name.''" :teacher="''.$course->course->teacher_id.''" :description="''.$course->course->description.''" :class="''.$course->course->class.''" :length="''.$course->course->length.''" :status="''.$course->course->status.''" :season="''.$course->course->season.''" :dtlroute="'/'" :editroute="'/'" :delroute="'/'"/>                
            @endforeach
        </section>
    @endif

    @if($user->role == 'Student' || $user->role == 'Teacher')
        <section class="">
            <h1 class="text-m-blue bg-gray-900 ml-12 px-4 py-2 rounded-md inline-block">My Forms</h1>
            @if($forms->isEmpty())
                <h1 class="text-red-500">No forms found</h1>
            @endif
            @foreach($forms as $form)
                <x-form-div :fname="''.$form->f_name.''" :lname="''.$form->l_name.''" :email="''.$form->email.''" :birthday="''.$form->birthday.''" :length="''.$form->length.''" :class="''.$form->class.''" :season="''.$form->season.''" :reason="''.$form->reason.''" :dtlroute="'/'" :editroute="'/'" :delroute="'/'"></x-form-div>
            @endforeach
            @if($user->role == 'Student')
                <a class="text-green-500 hover:underline ml-14" href="{{route('course.form')}}">Send form</a>
            @endif
        </section>
    @endif
</div>
@endsection
