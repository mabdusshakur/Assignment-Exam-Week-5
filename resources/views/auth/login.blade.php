@extends('layouts.auth')
@section('content')
    @include('partials._alerts')
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" required>
                </div>
                <button class="btn btn-primary mt-2" type="submit">Login</button>
                <a class="btn btn-outline-success mt-2" href="/register">Go to Register</a>
            </form>
        </div>
    </div>
@endsection
