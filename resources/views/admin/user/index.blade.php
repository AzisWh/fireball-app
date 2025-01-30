@extends('admin.layout.layout')

@section('title', 'User Management')

@section('content')
<div class="container mt-4">
    <h2>User Management</h2>
    <a href="{{ route('admin.user.create') }}" class="btn btn-primary mb-3">Create User</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->role_type == 0) User 
                    @elseif($user->role_type == 1) Admin InRaga 
                    @elseif($user->role_type == 2) Super Admin 
                    @elseif($user->role_type == 3) Admin USSC 
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
