@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h2 class="my-4 text-center">Welcome to your Dashboard</h2>

        <div class="card">
            <h2 class="mb-3 card-header" >User's Credentials</h2>
            <div class="card-body">
                <h5 class="card-title">Name: {{ $user['name'] }}</h5>
                <p class="card-text">Email: {{ $user['email'] }}</p>
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal">Edit Profile</button>
                <a href="/logout" class="btn btn-danger">Logout</a>
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete Account</button>
            </div>
        </div>

        <h2 class="py-3 ">Registered Users</h2>
        <?php foreach ($users as $user): ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Name: {{ $user['name'] }}</h5>
                    <p class="card-text">Email: {{ $user['email'] }}</p>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Update Profile Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/update" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $user['email'] }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password (optional)</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter a new password if you want to change it">
                            </div>
                            <input type="hidden" name="id" value="{{ $user['id'] }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Account Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="/delete" method="POST">
                            <input type="hidden" name="id" value="{{ $user['id'] }}">
                            <button type="submit" name="delete" class="btn btn-danger">Delete Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection