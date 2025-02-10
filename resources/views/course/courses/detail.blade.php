@extends('structures.main')
@section('title', ''.__('title.course-detail').'')
@section('content')
<div class="mt-12 px-6 md:px-12 lg:px-[10%]">
    <section id="left">
        <x-course-div 
        :name="''.$course->name.''" 
        :teacher="''.$teacher->f_name.' '.$teacher->l_name.''" 
        :description="''.$course->description.''" 
        :class="''.$course->class.''" 
        :length="''.$course->length.''" 
        :status="''.$course->status.''" 
        :season="''.$course->season.''" 
        :id="''.$course->id.''" 
        :students="''.$students.''"
        :divclass="'h-auto md:h-96'"
        :hclass="'text-2xl md:text-3xl font-semibold text-m-blue dark:text-white mb-4'"
        :pclass="'dark:text-white text-m-blue'"
        :sclass="'dark:text-m-blue text-gray-900'"
        :tclass="'text-lg md:text-xl font-semibold mb-4 text-m-blue dark:text-white'"
        />
    </section>
</div>
@endsection
