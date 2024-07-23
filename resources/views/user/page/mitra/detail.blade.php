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
                            <h1 data-aos="fade-up"  data-aos-delay="">{{ $mitra->namamitra }}</h1>
                            <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <section class="container mt-5">
        <div class="row">
            @if (empty($mitra) || (empty($mitra->image) && empty($mitra->detail) && empty($mitra->contact_person)))
                <div class="col-md-12 text-center">
                    <h1 class="fw-bold">Belum Tersedia</h1>
                </div>                                                                           
            @else
                <div class="col-md-8 d-flex justify-content-center mb-5">
                    @if ($mitra->image)
                        <img src="{{ asset('storage/' . $mitra->image) }}" class="img-fluid" alt="{{ $mitra->namamitra }}">
                    @else
                        <p class="text-center">Gambar belum tersedia</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <h3>Detail Mitra</h3>
                    <p>{{ $mitra->detail ?? 'Detail belum tersedia' }}</p>
                    <h4>Contact Person: 
                        @if ($mitra->contact_person)
                            <span>
                                <a href="https://wa.me/{{ $mitra->contact_person }}" target="_blank">+{{ $mitra->contact_person }}</a>
                            </span> 
                        @else
                            <span>Contact person belum tersedia</span>
                        @endif
                    </h4>
                </div>  
            @endif
        </div>
    </section>
@endsection
