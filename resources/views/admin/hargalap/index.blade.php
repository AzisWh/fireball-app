<!-- resources/views/admin/mitras/index.blade.php -->
@extends('admin.layout.app')

@section('title', 'Harga Opsi Lapangan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Harga Lapangan</h1>
    <a href="{{ route('hargalap.create') }}" class="btn btn-primary">Add Harga Lapangan</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Lapangan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($hargalap as $d)
        <tr>
            <td>{{ $d->id }}</td>
            <td>{{ $d->lapangan_tempat ? "{$d->lapangan_tempat->lapangan->nama_lapangan} - {$d->lapangan_tempat->nama_tempat}" : 'N/A' }}</td>
            <td>{{ $d->tanggal }}</td>
            <td>{{ $d->jam }} - {{ $d->mock_hour }}</td>
            <td>{{ 'Rp. '.number_format($d->harga) }}</td>
            <td>
                <a href="{{ route('hargalap.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('hargalap.destroy', $d->id) }}" method="POST" style="display:inline;">
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
