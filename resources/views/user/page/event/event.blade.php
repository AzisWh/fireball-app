@extends('user.layout.app')

@section('content')
    <!-- ======= Hero Section ======= -->
    <section class="hero-section inner-page">
        <div class="wave">
            <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
                        <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,667 L1017.15166,667 L0,667 L0,439.134243 Z" id="Path"></path>
                    </g>
                </g>
            </svg>
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

    <section class="section">
        <div class="container">
            <div class="filterSearch">
                <p style="margin-top: 20px; color: #000; font-size:24px;">Upcoming Events</p>
            </div>

            <div class="row">
                @forelse ($events as $event)
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h3>{{ $event->name }}</h3>
                                <p>{{ $event->description }}</p>
                                <p><strong>Start Date:</strong> {{ $event->start_date }} | <strong>End Date:</strong> {{ $event->end_date }}</p>

                                @foreach($event->activities as $activity)
                                    <div class="activity">
                                        <h4>{{ $activity->name }}</h4>
                                        <p>{{ $activity->description }}</p>
                                        
                                        @if(auth()->check())
                                            @php
                                                $isRegistered = $activity->registrations && $activity->registrations->contains('user_id', auth()->id());
                                            @endphp

                                            <form action="{{ route('activities.register', $activity->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" {{ $isRegistered ? 'disabled' : '' }}>
                                                    {{ $isRegistered ? 'Registered' : 'Register' }}
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
                    <p>No events available at the moment.</p>
                @endforelse
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1500
            });
        @endif
    </script>
@endsection
