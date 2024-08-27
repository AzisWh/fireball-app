@extends('admin.layout.app')

@section('title', 'Edit Event')

@section('content')
<div class="container mt-5">
    <h2>Edit Event</h2>
    
    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nama Event</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $event->description }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $event->start_date }}" required>
        </div>
        
        <div class="mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end_date }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update Event</button>
        <a href="{{ route('events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
