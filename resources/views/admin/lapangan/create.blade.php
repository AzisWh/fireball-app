@extends('admin.layout.layout')

@section('title', 'Add Lapangan')

@section('content')
<div class="container">
    <form action="{{ route('lapangan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="mitra_id">Mitra</label>
            <select name="mitra_id" class="form-control" required>
                @foreach($mitras as $mitra)
                <option value="{{ $mitra->id }}">{{ $mitra->namamitra }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_lapangan">Nama Lapangan</label>
            <input type="text" name="nama_lapangan" class="form-control" required>
        </div>
      
        <div class="form-group">
            <label for="jenis_id">Jenis Lapangan</label>
            <select name="jenis_id" class="form-control" required>
                @foreach($jenislap as $katlap)
                <option value="{{ $katlap->id }}">{{ $katlap->jenis_lapangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jumlah_lapangan">Jumlah Lapangan</label>
            <input type="number" name="jumlah_lapangan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga_lapangan_per_jamnya">Harga per Jam</label>
            <input type="number" name="harga_lapangan_per_jamnya" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="lokasi_lapangan">Lokasi Lapangan</label>
            <input type="text" name="lokasi_lapangan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
