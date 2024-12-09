@extends('structures.main')
@section('content')
<div class="ml-[10%] mt-[10%]">
    <section id="left" class="">
        <x-course-input-div 
        :name="''.$course->name.''" 
        :teacher="''.$teacher->f_name.' '.$teacher->l_name.''" 
        :description="''.$course->description.''" 
        :class="''.$course->class.''" 
        :length="''.$course->length.''" 
        :status="''.$course->status.''" 
        :season="''.$course->season.''" 
        :id="''.$course->id.''" 
        :students="''.$students.''"
        :divclass="'h-96'"
        :hclass="'text-3xl font-semibold mb-4 dark:text-white text-gray-900'"
        :pclass="'dark:text-white text-m-blue'"
        :sclass="'dark:text-white text-gray-900'"
        :selclass="'dark:bg-gray-800 dark:text-white bg-slate-200 text-m-blue'"
        :tclass="'text-xl font-semibold text-white mb-4'"
        :iptclass="'dark:bg-gray-800 dark:text-white bg-slate-200 text-m-blue'"
        />
    </section>
</div>
@endsection