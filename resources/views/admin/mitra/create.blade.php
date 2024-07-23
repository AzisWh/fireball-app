@extends('admin.layout.app')

@section('title', 'Add Mitra')

@section('content')
<div class="container">
    <form action="{{ route('mitra.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="namamitra">Nama Mitra</label>
            <input type="text" name="namamitra" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image Mitra</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="detail">Detail</label>
            <textarea name="detail" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" name="contact_person" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
</div>
@endsection
