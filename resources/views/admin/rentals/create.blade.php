@extends('layouts.admin')

@section('content')
    @include('partials._alerts')
    <h2>Add Rental</h2>
    <form action="{{ route('admin.rentals.store') }}" method="POST">
        @csrf
        <div class="row gap-2">
            <div class="form-group">
                <label for="user_id">Customer</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}" {{ old('user_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                    @endforeach
                </select>
                @error('user_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="car_id">Car</label>
                <select class="form-control" id="car_id" name="car_id" required>
                    @foreach ($cars as $car)
                        <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}> ({{ $car->brand }}) : {{ $car->name }}</option>
                    @endforeach
                </select>
                @error('car_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input class="form-control" id="start_date" name="start_date" type="date" value="{{ old('start_date') }}" required>
                @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input class="form-control" id="end_date" name="end_date" type="date" value="{{ old('end_date') }}" required>
                @error('end_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_cost">Total Cost (Optional)</label>
                <input class="form-control" id="total_cost" name="total_cost" type="number" value="{{ old('total_cost') }}">
                @error('total_cost')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option selected>Select an option</option>
                    <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="canceled" {{ old('status') == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
                @error('status')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button class="btn btn-outline-success mt-2" type="submit">Add Rental</button>
    </form>
@endsection
