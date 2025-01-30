@extends('admin.layout.layout')

@section('title', 'Add Kategori')

@section('content')
<div class="container">
    <form action="{{ route('katlap.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="jenis_lapangan">Jenis Lapangan</label>
            <input type="text" name="jenis_lapangan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
