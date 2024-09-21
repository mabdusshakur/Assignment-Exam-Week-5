@extends('layouts.app')

@section('content')
    @include('partials._alerts')

    <div class="col-4 w-100 mt-2 rounded p-4 shadow-sm">
        <div class="d-flex justify-content-around">
            <div>
                <h3>{{ $car->brand }}</h3>
                <p>Model: {{ $car->model }}</p>
                <p>Daily Rent Price: <span class="font-weight-bold">$ {{ $car->daily_rent_price }}</span></p>
                <p>Year: {{ $car->year }}</p>
                <p>Type: {{ $car->car_type }}</p>
                <img class="img-thumbnail w-25 my-2" src="{{ asset($car->image) }}" alt="{{ $car->brand }} - {{ $car->car_type }}">
            </div>

            <div class="col-4 mt-2 rounded p-4 shadow-sm">
                <form id="front_rental_form" action="{{ route('frontend.rentals.store') }}" method="POST">
                    @csrf
                    <input name="car_id" type="hidden" value="{{ $car->id }}">

                    <div class="row gap-2">
                        <div class="form-group">
                            <label for="start_date">Start Date</label>
                            <input class="form-control" id="start_date" name="start_date" type="text" required>
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="end_date">End Date</label>
                            <input class="form-control" id="end_date" name="end_date" type="text" required>
                            @error('end_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-outline-success mt-2" id="submitBtn" type="submit">Book Now</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            var unavailableDates = @json($unavailableDates);

            function disableDates(date) {
                var today = new Date();
                today.setHours(0, 0, 0, 0);
                var string = jQuery.datepicker.formatDate('yy-mm-dd', date);

                if (date < today || unavailableDates.indexOf(string) != -1) {
                    return [false];
                } else {
                    return [true];
                }
            }

            $("#start_date, #end_date").datepicker({
                dateFormat: 'yy-mm-dd',
                beforeShowDay: disableDates
            });

            $('#front_rental_form').on('submit', function() {
                $('#submitBtn').prop('disabled', true);
                $('#submitBtn').html('Processing...');
            });
        });
    </script>
@endsection
