@extends('structures.main')
@section('title', 'chasmakar buzerant create')
@section('content')
<div class="container">
    <h2>Add New Car</h2>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" class="form-control">
        </div>
        <div class="form-group">
            <label>Model</label>
            <input type="text" name="model" class="form-control">
        </div>
        <div class="form-group">
            <label>Year</label>
            <input type="text" name="year" class="form-control">
        </div>
        <div class="form-group">
            <label>Horsepower</label>
            <input type="text" name="horsepower" class="form-control">
        </div>
        <div class="form-group">
            <label>Cubage</label>
            <input type="text" name="cubage" class="form-control">
        </div>
        <div class="form-group">
            <label>Gearbox</label>
            <input type="text" name="gearbox" class="form-control">
        </div>
        <div class="form-group">
            <label>Drive</label>
            <input type="text" name="drive" class="form-control">
        </div>
        <div class="form-group">
            <label>Mileage</label>
            <input type="text" name="mileage" class="form-control">
        </div>
        <div class="form-group">
            <label>Images</label>
            <input type="file" name="images[]" multiple class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Save</button>
    </form>
</div>
@endsection