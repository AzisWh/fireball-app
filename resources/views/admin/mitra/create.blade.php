@extends('admin.layout.app')

@section('title', 'Add Mitra')

@section('content')
<div class="container">
    <form action="{{ route('mitra.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="namamitra">Nama Mitra</label>
            <input type="text" name="namamitra" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
