@extends('admin.layout.layout')

@section('title', 'Create User')

@section('content')
<div class="container mt-4">
    <h2>Create User</h2>
    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group mb-3">
            <label for="role_type">Role Type</label>
            <select name="role_type" class="form-control" required>
                <option value="0">User</option>
                <option value="1">Admin InRaga</option>
                <option value="2">Super Admin</option>
                <option value="3">Admin USSC</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
</div>
@endsection
