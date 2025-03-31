@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="text-center" style="padding: 100px 0;">
        <div class="card shadow-lg" style="max-width: 600px; margin: 0 auto; background-color: #34495e;">
            <div class="card-body">
                <h1 class="card-title mb-4 text-white">Login</h1>
                <form action="/login" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="mt-3 text-center">
                    <p class="text-white">Don't have an account? <a href="/register" class="text-light">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection