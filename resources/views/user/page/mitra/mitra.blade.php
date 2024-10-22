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
                    <h1 data-aos="fade-up"  data-aos-delay="">Bermitra Dengan Kami</h1>
                    <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>  

    <section class="container mt-5">
        <div class="row">
            <h4 data-aos="fade-up" class="mb-5">Cp Inraga (Enzo) : 
                <span>
                    <a href="https://wa.me/6282137266904" target="_blank">+62 821-3726-6904</a>
                </span>
            </h4>
            <h4 data-aos="fade-up">Mitra Kami</h4>
              
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.udinus') }}"> 
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">UDINUS</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/udinus.png') }}" class="img-fluid " style="width: 150px" alt="UDINUS">
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.arena') }}"> 
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">The Arena</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/arena.png') }}" class="img-fluid " style="width: 150px" alt="UDINUS">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.minton') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Dinus Badminton Club</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/dinusminton.png') }}" class="img-fluid " style="width: 150px" alt="Dinus Badminton">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.psis') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">PSIS</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/psis.svg') }}" class="img-fluid " style="width: 150px" alt="PSIS">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.liken') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Liken Sport</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/likensport.png') }}" class="img-fluid " style="width: 150px" alt="Liken Sport">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.club') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">The Club</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/theclub.png') }}" class="img-fluid " style="width: 150px" alt="The Club">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.thechampion') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">The Champion Stadium</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/thechampionstadium.png') }}" class="img-fluid " style="width: 150px" alt="The Champion Stadium">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.ormawa') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Ormawa Udinus</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/ormawa.png') }}" class="img-fluid " style="width: 150px" alt="Ormawa Udinus">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.porsik') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">PORSIK</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/smakristen.png') }}" class="img-fluid " style="width: 150px" alt="PORSIK">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.zonasport') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Zona Sport Apparel</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/zonasport.png') }}" class="img-fluid " style="width: 150px" alt="Zona Sport Apparel">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.indosport') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Indosport</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/indosport.png') }}" class="img-fluid " style="width: 150px" alt="Indosport">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail.suara') }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">Suara Merdeka</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('assets/img/mitra/suaramerdeka.png') }}" class="img-fluid " style="width: 150px" alt="Suara Merdeka">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            {{-- @if (count($mitra)>0)
            @foreach ($mitra as $item)
            <div class="col-md-4" data-aos="fade-up">
                <a href="{{ route('mitra.detail', $item->id) }}">
                    <div class="card mb-4 shadow-sm rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-center">{{ $item->namamitra }}</h5>
                            <hr>
                            <div class="d-flex justify-content-center">
                                @if ($item->image)
                                     @php
                                        $imagePath = Storage::url('mitra/' . $item->image);
                                    @endphp
                                     <img src="{{ asset('storage/mitra/' . $item->image) }}" class="img-fluid " style="width: 150px" alt="{{ $item->namamitra }}">
                                @else
                                    <p class="text-center">Gambar belum tersedia</p>
                                @endif 
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @else
                <div class="col-md-12">
                    <h1 class="text-center fw-bold">BELUM ADA MITRA</h1>
                </div>
            @endif  --}}
           
        </div>
    </section>
  
@endsection