@extends('user.layout.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section class="hero-section inner-page">
        <div class="wave">
            <!-- SVG content -->
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-7 text-center hero-text">
                            <h1 data-aos="fade-up" data-aos-delay="">Event Page</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="section">
        <div class="container">
            <div class="filterSearch">
                <p class="mt-4 text-dark" style="font-size:24px;">Upcoming Battle</p>
            </div>

            <div class="row">
                @forelse ($upcomingEvents as $event)
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($event->image)
                                <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->name }}" class="card-img-top img-fluid rounded">
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{ $event->name }}</h3>
                                <p class="card-text">{{ $event->description }}</p>
                                <p><strong>Start Date:</strong> {{ $event->start_date }} | <strong>End Date:</strong> {{ $event->end_date }}</p>

                                @foreach($event->activities as $activity)
                                    <div class="activity mb-3">
                                        <h5>{{ $activity->name }}</h5>
                                        <p>{{ $activity->description }}</p>
                                        <p>sisa slot : {{ $activity->slot }} tim</p>
                                        <p>Harga: Rp {{ number_format($activity->price, 2) }}</p>
                                        
                                        @if(auth()->check())
                                            @php
                                                $isRegistered = $activity->registrations && $activity->registrations->contains('user_id', auth()->id());
                                            @endphp

                                            <form action="{{ route('activity.payment', $activity->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm" {{ $isRegistered ? 'disabled' : '' }}>
                                                    {{ $isRegistered ? 'Sudah Terdaftar' : 'Daftar' }}
                                                </button>
                                            </form>
                                        @else
                                            <p>Please <a href="{{ route('login') }}">login</a> to register.</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No upcoming Battle available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Finished Events Section -->
    <section class="section">
        <div class="container">
            <div class="filterSearch">
                <p class="mt-4 text-dark" style="font-size:24px;">Finished Battle</p>
            </div>

            <div class="row">
                @forelse ($finishedEvents as $event)
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($event->image)
                                <img src="{{ asset('storage/'.$event->image) }}" alt="{{ $event->name }}" class="card-img-top img-fluid rounded" >
                            @endif
                            <div class="card-body">
                                <h3 class="card-title">{{ $event->name }}</h3>
                                <p class="card-text">{{ $event->description }}</p>
                                <p>Harga: Rp {{ number_format($activity->price, 2) }}</p>
                                <p><strong>Start Date:</strong> {{ $event->start_date }} | <strong>End Date:</strong> {{ $event->end_date }}</p>

                                @foreach($event->activities as $activity)
                                    <div class="activity mb-3">
                                        <h5>{{ $activity->name }}</h5>
                                        <p>{{ $activity->description }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No finished battle available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
