@extends('layouts.app')

@section('content')
    @include('partials._alerts')
    <h2>All Cars</h2>
    <form method="GET" action="{{ route('frontend.cars.index') }}">
        <div class="row">
            <div class="form-group col-md-4">
                <label for="type">Car Type</label>
                <select class="form-control" id="type" name="type">
                    <option value="">All</option>
                    @foreach ($car_types as $type)
                        <option value="{{ $type->car_type }}" @if (request('type') == $type->car_type) selected @endif>{{ $type->car_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="brand">Brand</label>
                <select class="form-control" id="brand" name="brand">
                    <option value="">All</option>
                    @foreach ($car_brands as $brand)
                        <option value="{{ $brand->brand }}" @if (request('brand') == $brand->brand) selected @endif>{{ $brand->brand }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="search">Search</label>
                <input class="form-control" id="search" name="price" type="text" value="{{ request('price') }}" placeholder="Price Filter (Show vehicles under given price)">
            </div>
        </div>
        <button class="btn btn-outline-success mt-2" type="submit">Filter</button>
    </form>
    <div class="mt-4">
        @foreach ($cars as $car)
            <div class="card mb-3">
                <div class="d-flex align-items-center justify-content-evenly mx-2 p-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $car->brand }} - {{ $car->car_type }}</h5>
                        <p class="card-text">Daily Rent Price: ${{ $car->daily_rent_price }}</p>
                        <a class="btn btn-outline-success" href="{{ route('frontend.cars.show', $car->id) }}">View Details</a>
                    </div>
                    <img class="img-thumbnail" src="{{ $car->image }}" alt="{{ $car->brand }} - {{ $car->car_type }}" style="height:100px;">
                </div>
            </div>
        @endforeach
    </div>
@endsection
