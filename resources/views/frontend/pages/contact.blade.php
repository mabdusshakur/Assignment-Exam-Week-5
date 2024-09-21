@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-4">Contact Page</h1>
        <p class="lead">If you have any problems, please email us at <a href="mailto:mabdusshakur12@gmail.com">mabdusshakur12@gmail.com</a> or submit the form below.</p>
        <p class="text-muted">We will get back to you as soon as possible.</p>
        <p>Thanks</p>

        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" id="name" name="name" type="text" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button class="btn btn-primary mt-2" type="submit">Submit</button>
        </form>
    </div>
@endsection
