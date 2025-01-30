
@extends('admin.layout.layout')

@section('title', 'Lapangan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Manage Lapangan</h1>
    <a href="{{ route('lapangan.create') }}" class="btn btn-primary">Add Lapangan</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Location</th>
            <th>Jumlah Lapangan</th>
            <th>Harga Normal</th>
            <th>Mitra</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($lapangans as $lapangan)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $lapangan->nama_lapangan }}</td>
            <td>{{ $lapangan->kategori ? $lapangan->kategori->jenis_lapangan : 'N/A' }}</td>
            <td>{{ $lapangan->lokasi_lapangan }}</td>
            <td>{{ $lapangan->jumlah_lapangan }}</td>
            <td>{{ "Rp. ".number_format($lapangan->harga_lapangan_per_jamnya) }}</td>
            <td>{{ $lapangan->mitra ? $lapangan->mitra->namamitra : 'N/A' }}</td>
            <td>
                <div class="d-flex ">
                    <a href="{{ route('lapangan.edit', $lapangan->id) }}" class="btn btn-sm btn-warning mr-2">Edit</a>
                    <form action="{{ route('lapangan.destroy', $lapangan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
