@extends('structures.main')
@section('title', ''.__('title.course-edit').'')
@section('content')
<div class="flex items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-3xl">
                <x-course-input-div 
                :name="$course->name"  
                :description="$course->description" 
                :class="$course->class" 
                :length="$course->length" 
                :status="$course->status" 
                :season="$course->season" 
                :id="$course->id" 
                :students="$students"
                :teachers="$teachers"
                />
        </div>
</div>
@endsection
