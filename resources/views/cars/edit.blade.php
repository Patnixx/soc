@extends('structures.main')
@section('title', 'chasmakar buzerant edit')
@section('content')
<div class="container">
    <h2>Edit Car</h2>
    <form action="{{ route('cars.update', $car) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="brand" value="{{ $car->brand }}" class="form-control">
        <input type="text" name="model" value="{{ $car->model }}" class="form-control">
        <input type="text" name="year" value="{{ $car->year }}" class="form-control">
        <input type="text" name="horsepower" value="{{ $car->horsepower }}" class="form-control">
        <input type="text" name="cubage" value="{{ $car->cubage }}" class="form-control">
        <input type="text" name="gearbox" value="{{ $car->gearbox }}" class="form-control">
        <input type="text" name="drive" value="{{ $car->drive }}" class="form-control">
        <input type="text" name="mileage" value="{{ $car->mileage }}" class="form-control">
        <label>Upload New Images:</label>
        <input type="file" name="images[]" multiple class="form-control">
        <button type="submit" class="btn btn-warning mt-3">Update</button>
    </form>
</div>
@endsection