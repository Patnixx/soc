@extends('structures.main')
@section('content')
<div class="ml-[10%] mt-[10%]">
    <section id="left" class="">
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
        :divclass="'h-96'"
        :hclass="'text-3xl font-semibold text-white mb-4'"
        :pclass="'text-white text-lg'"
        :sclass="'text-m-blue'"
        :tclass="'text-xl font-semibold text-white mb-4'"
        />
    </section>
</div>
@endsection