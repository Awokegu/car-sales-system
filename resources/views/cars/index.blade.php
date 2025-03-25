@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Car Listings</h2>
    <a href="{{ route('cars.create') }}" class="btn btn-primary">Add Car</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Year</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
            <tr>
                <td>{{ $car->name }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->year }}</td>
                <td>${{ $car->price }}</td>
                <td>
                    @if($car->image)
                        <img src="{{ asset('storage/'.$car->image) }}" width="100">
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
