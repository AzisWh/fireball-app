@extends('admin.layout.app')

@section('title', 'Daftar Event')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Event</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Tambah Event</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Event</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($events as $event)
        <tr>
            <td>{{ $event->id }}</td>
            <td>{{ $event->name }}</td>
            <td>{{ $event->start_date }}</td>
            <td>{{ $event->end_date }}</td>
            <td>
                <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
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
