{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="d-flex justify-content-between collapse mx-5">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.cars.index') }}">Cars</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.rentals.index') }}">Rentals</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.customers.index') }}">Customers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
</body> --}}

</html>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="{{ route('admin.dashboard') }}">Dashboard</a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" type="button" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mb-lg-0 mb-2 ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.cars.index') }}">Cars</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.rentals.index') }}">Rentals</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.customers.index') }}">Customers</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
