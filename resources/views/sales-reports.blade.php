@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Sales Reports</h2>

    <!-- Filter by Date -->
    <form method="GET" action="{{ route('sales.reports') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-4">
                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="{{ route('sales.reports.export') }}" class="btn btn-success">Export CSV</a>
            </div>
        </div>
    </form>

    <!-- Sales Table -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Transaction ID</th>
                    <th>Car</th>
                    <th>Customer</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->id }}</td>
                    <td>{{ $sale->car->name }}</td>
                    <td>{{ $sale->customer->name }}</td>
                    <td>${{ number_format($sale->price, 2) }}</td>
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $sales->links() }}
    </div>
</div>
@endsection
