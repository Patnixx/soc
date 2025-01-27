@extends('structures.main')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-6">
    <div class="w-full max-w-lg bg-white dark:bg-gray-900 shadow-lg rounded-lg p-6 space-y-4 transition-all duration-300 ease-linear">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
            Add Courses to Syllab
        </h2>
        <div class="w-full max-w-2xl space-y-4">
            <form action="{{route('syllab.addCourse', ['id' => $id])}}" method="post">
                @csrf
                <select name="courseId" id="courseId">
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }} ({{$course->teacher->f_name}} {{$course->teacher->l_name}})</option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
</div>
@endsection