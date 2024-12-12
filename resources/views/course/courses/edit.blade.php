@extends('structures.main')
@section('content')
<div class="flex flex-col items-center justify-center min-h-screen">
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
        />
</div>
@endsection