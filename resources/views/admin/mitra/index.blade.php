<!-- resources/views/admin/mitras/index.blade.php -->
@extends('admin.layout.app')

@section('title', 'Mitra')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Mitra</h1>
    <a href="{{ route('mitra.create') }}" class="btn btn-primary">Add Mitra</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Detail</th>
            <th>Contact Person</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mitras as $mitra)
        <tr>
            <td>{{ $mitra->id }}</td>
            <td>{{ $mitra->namamitra }}</td>
            <td>
                @if (empty($mitra->image))
                    <img src="https://img.freepik.com/premium-photo/graphic-designer-digital-avatar-generative-ai_934475-9292.jpg" alt="/" class="img-thumbnail" style="width: 100px">
                @else
                    <img src="{{ asset('storage/mitra/' . $mitra->image) }}" class="img-thumbnail" style="width: 100px" alt="{{ $mitra->namamitra }}">
                @endif
            </td>
            <td>{{ $mitra->detail }}</td>
            <td>{{ $mitra->contact_person }}</td>
            <td>
                <a href="{{ route('mitra.edit', $mitra->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('mitra.destroy', $mitra->id) }}" method="POST" style="display:inline;">
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
