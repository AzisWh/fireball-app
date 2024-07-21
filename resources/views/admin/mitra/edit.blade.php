@extends('admin.layout.app')

@section('title', 'Edit Mitra')

@section('content')
<div class="container">
    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="namamitra">Nama Mitra</label>
            <input type="text" name="namamitra" class="form-control" value="{{ $mitra->namamitra }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
