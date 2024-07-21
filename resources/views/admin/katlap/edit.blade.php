@extends('admin.layout.app')

@section('title', 'Edit Jenis')

@section('content')
<div class="container">
    <form action="{{ route('katlap.update', $katlap->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="jenis_lapangan">Jenis Lapangan</label>
            <input type="text" name="jenis_lapangan" class="form-control" value="{{ $katlap->namamitra }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
