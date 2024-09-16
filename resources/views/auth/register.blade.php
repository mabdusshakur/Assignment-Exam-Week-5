@extends('layouts.auth')
@section('content')
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <div class="alert alert-danger my-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="alert alert-danger my-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" id="password" name="password" type="password" required>
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input class="form-control" id="password-confirm" name="password_confirmation" type="password" required>
                    @error('password')
                        <div class="alert alert-danger my-1">{{ $message }}</div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit">Register</button>
            </form>
        </div>
    </div>
@endsection
