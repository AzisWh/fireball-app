@extends('admin.layout.app')

@section('title', 'Add Harga')

@section('content')
<div class="container">
    <form action="{{ route('hargalap.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="lapangan_tempat_id">Nama Lapangan</label>
            <select name="lapangan_tempat_id" class="form-control" required>
                @foreach($tempats as $item)
                <option value="{{ $item->id }}">{{ $item->lapangan->nama_lapangan }} - {{ $item->nama_tempat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jam">Jam</label>
            <input type="number" min="1" max="23" name="jam" id="jam" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number"  name="harga" id="harga" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
