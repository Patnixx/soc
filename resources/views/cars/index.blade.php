@extends('structures.main')
@section('title', 'chasmakar buzerant')
@section('content')
<div class="container">
    <h2>Cars List</h2>
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Add New Car</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Horsepower</th>
                <th>Cubage</th>
                <th>Gearbox</th>
                <th>Drive</th>
                <th>Mileage</th>
                <th>Images</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->horsepower }}</td>
                <td>{{ $car->cubage }}</td>
                <td>{{ $car->gearbox }}</td>
                <td>{{ $car->drive }}</td>
                <td>{{ $car->mileage }}</td>
                <td>
                    @foreach($car->images as $image)
                        <img src="{{ asset('storage/car_images/' . $image->image_name) }}" alt="Car Image">
                    @endforeach
                </td>
                <td>
                    <a href="{{ route('cars.edit', $car) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('cars.destroy', $car) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection