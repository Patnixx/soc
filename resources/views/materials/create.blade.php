@extends('structures.main')
@section('title', 'create material')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add Material to {{ $course->name }}</h1>
    <form action="{{ route('materials.store', $course) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block font-bold">Title</label>
            <input type="text" name="title" id="title" class="border-gray-300 rounded w-full">
        </div>
        <div>
            <label for="description" class="block font-bold">Description</label>
            <textarea name="description" id="description" class="border-gray-300 rounded w-full"></textarea>
        </div>
        <div>
            <label for="file" class="block font-bold">File</label>
            <input type="file" name="file" id="file" class="border-gray-300 rounded w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Material</button>
    </form>
</div>