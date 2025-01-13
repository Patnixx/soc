@extends('structures.main')
@section('title', 'material')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Materials for {{ $course->name }}</h1>
    <a href="{{ route('materials.create', $course) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Add Material
    </a>

    <div class="mt-6">
        @foreach ($materials as $material)
            <div class="p-4 mb-4 bg-white shadow rounded">
                <h2 class="text-lg font-bold">{{ $material->title }}</h2>
                <p>{{ $material->description }}</p>
                @if ($material->pivot->is_unlocked)
                    <p class="text-green-500 font-bold">Unlocked</p>
                    @if ($material->file_path)
                        <a href="{{ Storage::url($material->file_path) }}" class="text-blue-500 underline" download>Download</a>
                    @endif
                @else
                    <form method="POST" action="{{ route('materials.unlock', [$course, $material]) }}">
                        @csrf
                        <button class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Unlock</button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection