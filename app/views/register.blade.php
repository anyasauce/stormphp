@extends('layouts.main')
@section('title', 'Register')
@section('content')
    <div class="text-center" style="padding: 100px 0;">
        <div class="card shadow-lg" style="max-width: 600px; margin: 0 auto; background-color: #34495e;">
            <div class="card-body">
                <h1 class="card-title mb-4 text-white">Register</h1>
                <form action="/register" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label text-white">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label text-white">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                </form>
                <div class="mt-3 text-center">
                    <p class="text-white">Already have an account? <a href="/login" class="text-light">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
