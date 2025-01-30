@extends('admin.layout.layout')

@section('title', 'Edit Mitra')

@section('content')
<div class="container">
    <form action="{{ route('mitra.update', $mitra->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="namamitra">Nama Mitra</label>
            <input type="text" name="namamitra" value="{{ $mitra->namamitra }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image Mitra</label>
            <input type="file" name="image" class="form-control">
            @if ($mitra->image)
                <img src="{{ asset('storage/' . $mitra->image) }}" width="300px">
            @endif
        </div>
        <div class="form-group">
            <label for="detail">Detail</label>
            <textarea name="detail" class="form-control">{{ $mitra->detail }}</textarea>
        </div>
        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" name="contact_person" value="{{ $mitra->contact_person }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>
@endsection
