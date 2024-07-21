@extends('admin.layout.app')

@section('title', 'Edit Lapangan')

@section('content')
<div class="container">
    <form action="{{ route('lapangan.update', $lapangan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="mitra_id">Mitra</label>
            <select name="mitra_id" class="form-control" required>
                @foreach($mitras as $mitra)
                <option value="{{ $mitra->id }}" {{ $lapangan->mitra_id == $mitra->id ? 'selected' : '' }}>{{ $mitra->namamitra }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_lapangan">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" class="form-control" value="{{ $lapangan->nama_lapangan }}" required>
        </div>
        <div class="form-group">
            <label for="kategori_lapangan">Kategori Lapangan</label>
            <input type="text" name="kategori_lapangan" class="form-control" value="{{ $lapangan->kategori_lapangan }}" required>
        </div>
        <div class="form-group">
            <label for="jumlah_lapangan">Jumlah Lapangan</label>
            <input type="number" name="jumlah_lapangan" class="form-control" value="{{ $lapangan->jumlah_lapangan }}" required>
        </div>
        <div class="form-group">
            <label for="harga_lapangan_per_jamnya">Harga per Jam</label>
            <input type="number" name="harga_lapangan_per_jamnya" class="form-control" value="{{ $lapangan->harga_lapangan_per_jamnya }}" required>
        </div>
        <div class="form-group">
            <label for="lokasi_lapangan">Lokasi Lapangan</label>
            <input type="text" name="lokasi_lapangan" class="form-control" value="{{ $lapangan->lokasi_lapangan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
