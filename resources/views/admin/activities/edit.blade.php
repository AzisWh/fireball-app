@extends('admin.layout.layout')

@section('title', 'Edit Activity')

@section('content')
<div class="container">
    <h1 class="h2">Edit Activity: {{ $activity->name }}</h1>
    <form action="{{ route('events.activities.update', [$event->id, $activity->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Activity</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $activity->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga </label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $activity->price }}" required>
        </div>
        <div class="mb-3">
            <label for="slot" class="form-label">Jumlah Tim/Player</label>
            <input type="number"  class="form-control" id="slot" name="slot" value="{{ $activity->slot }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
