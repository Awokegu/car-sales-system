@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="hero bg-dark text-white text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Find Your Dream Car Today</h1>
        <p class="lead">Best deals on new and used cars at unbeatable prices!</p>
        <a href="{{ url('/cars') }}" class="btn btn-primary btn-lg mt-3">Browse Cars</a>
    </div>
</section>

<!-- Car Categories -->
<section class="container my-5">
    <h2 class="text-center mb-4">Browse by Category</h2>
    <div class="row text-center">
        <div class="col-md-3">
            <div class="card p-3">
                <img src="{{ asset('images/sedan.jpg') }}" class="img-fluid" alt="Sedan">
                <h5 class="mt-2">Sedans</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <img src="{{ asset('images/suv.jpg') }}" class="img-fluid" alt="SUV">
                <h5 class="mt-2">SUVs</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <img src="{{ asset('images/truck.jpg') }}" class="img-fluid" alt="Truck">
                <h5 class="mt-2">Trucks</h5>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card p-3">
                <img src="{{ asset('images/electric.jpg') }}" class="img-fluid" alt="Electric">
                <h5 class="mt-2">Electric</h5>
            </div>
        </div>
    </div>
</section>

<!-- Featured Cars -->
<section class="container my-5">
    <h2 class="text-center mb-4">Featured Cars</h2>
    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $car->image) }}" class="card-img-top" alt="{{ $car->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text">{{ $car->brand }} - {{ $car->year }}</p>
                    <p class="fw-bold text-primary">${{ number_format($car->price, 2) }}</p>
                    <a href="{{ url('/cars/'.$car->id) }}" class="btn btn-outline-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<!-- Testimonials -->
<section class="bg-light py-5">
    <div class="container text-center">
        <h2 class="mb-4">What Our Customers Say</h2>
        <div class="row">
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Best car buying experience ever! The process was smooth and hassle-free."</p>
                    <footer class="blockquote-footer">Awoke Gu</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Amazing deals on used cars. I got my dream car at an unbelievable price!"</p>
                    <footer class="blockquote-footer">Abreham</footer>
                </blockquote>
            </div>
            <div class="col-md-4">
                <blockquote class="blockquote">
                    <p>"Great customer service and excellent variety of cars to choose from!"</p>
                    <footer class="blockquote-footer">Dawit</footer>
                </blockquote>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us -->
<section class="container my-5 text-center">
    <h2>Contact Us</h2>
    <p>Have any questions? Reach out to us!</p>
    <a href="{{ url('/contact') }}" class="btn btn-success">Contact Now</a>
</section>

@endsection
