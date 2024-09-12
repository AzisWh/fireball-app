@extends('admin.layout.app')

@section('title', 'Tambah Activity')

@section('content')
<div class="container">
    <h1 class="h2">Tambah Activity untuk Event: {{ $event->name }}</h1>
    <form action="{{ route('events.activities.store', $event->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Activity</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga Activity</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
