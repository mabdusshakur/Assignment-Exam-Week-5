@extends('layouts.admin')

@section('content')
    <h1>Customer Rentals</h1>
    <h2>{{ $customer->name }}</h2>
    <p>Email: {{ $customer->email }}</p>
    <p>Phone: {{ $customer->phone }}</p>
    <p>Address: {{ $customer->address }}</p>

    <h3>Rental History</h3>
    <table class="table-bordered table">
        <thead>
            <tr>
                <th>Car</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customer->rentals as $rental)
                <tr>
                    <td>{{ $rental->car->name }}</td>
                    <td>{{ $rental->start_date }}</td>
                    <td>{{ $rental->end_date }}</td>
                    <td>{{ $rental->total_cost }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
