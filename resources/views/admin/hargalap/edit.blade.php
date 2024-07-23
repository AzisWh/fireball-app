@extends('admin.layout.app')

@section('title', 'Edit Harga')

@section('content')
<div class="container">
    <form action="{{ route('hargalap.update', $hargalap->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="lapangan_id">Lapangan</label>
            <select name="lapangan_id" class="form-control" required>
                @foreach($jenislap as $item)
                <option value="{{ $item->id }}" {{ $item->lapangan->nama_lapangan ? 'selected' : '' }}>{{ $item->nama_tempat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $hargalap->tanggal }}" required>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="number" name="jam" class="form-control" value="{{ $hargalap->jam }}" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" class="form-control" value="{{ $hargalap->harga }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
