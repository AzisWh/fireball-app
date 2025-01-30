@extends('admin.layout.layout')

@section('title', 'Kategori Lapangan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Kategori</h1>
    <a href="{{ route('katlap.create') }}" class="btn btn-primary">Add Jenis Lapangan</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jenislap as $katlap)
        <tr>
            <td>{{ $katlap->id }}</td>
            <td>{{ $katlap->jenis_lapangan }}</td>
            <td>
                <a href="{{ route('katlap.edit', $katlap->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('katlap.destroy', $katlap->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
