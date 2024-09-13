@extends('admin.layout.app')

@section('title', 'Detail Event')

@section('content')
<div class="container">
    <h1 class="h2">{{ $event->name }}</h1>
    <p><strong>Tanggal Mulai:</strong> {{ $event->start_date }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $event->end_date }}</p>
    <h3>Tambah Activities</h3>
    <a href="{{ route('events.activities.create', $event->id) }}" class="btn btn-primary">Tambah Activity</a>
    <ul class="list-group mt-3">
        @foreach ($event->activities as $activity)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $activity->name }} - Price ( {{$activity->price}} ) - Jumlah Tim ( {{ $activity->slot }} )
                <div>
                    <a href="{{ route('events.activities.edit', [$event->id, $activity->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('events.activities.destroy', [$event->id, $activity->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection
