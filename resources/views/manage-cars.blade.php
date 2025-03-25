@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Manage Cars</h2>
    
    <!-- Add Car Button -->
    <a href="{{ route('cars.create') }}" class="btn btn-primary mb-3">Add New Car</a>

    <!-- Cars Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Car Name</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>${{ number_format($car->price, 2) }}</td>
                    <td>{{ $car->year }}</td>
                    <td>
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $cars->links() }}
    </div>
</div>
@endsection
