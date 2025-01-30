@extends('admin.layout.layout')

@section('title', 'Edit User')

@section('content')
<div class="container mt-4">
    <h2>Edit User</h2>
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="password">Password (Leave blank to keep current password)</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="role_type">Role Type</label>
            <select name="role_type" class="form-control" required>
                <option value="0" {{ $user->role_type == 0 ? 'selected' : '' }}>User</option>
                <option value="1" {{ $user->role_type == 1 ? 'selected' : '' }}>Admin InRaga</option>
                <option value="2" {{ $user->role_type == 2 ? 'selected' : '' }}>Super Admin</option>
                <option value="3" {{ $user->role_type == 3 ? 'selected' : '' }}>Admin USSC</option>
            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
