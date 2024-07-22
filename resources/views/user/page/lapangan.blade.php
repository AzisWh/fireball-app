@extends('user.layout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section class="hero-section inner-page">

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up"  data-aos-delay="">Lapangan - {{ $kategori_name }}<b></b> </h1>
              <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- ======= Home Section ======= -->

  <section class="section">
    <div class="container">
      
      @if (count($detail))
        <div class="filterSearch">
          <p style="margin-top: 20px; color: #000; font-size:24px;">Lapangan Tersedia</p>
        </div>
        <div class="cardEvent">
          <div class="row">
            @foreach ($detail as $item)
              <div class="col-md-4 col-sm-6">
                <a href="{{ route('user.lapangan_jam', $item->id) }}">
                    <div class="card mx-auto" style="width: 24rem;">
                        <img src="{{ asset('assets/img/event/poster.jpeg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>Nama Mitra : {{$item->mitra->namamitra}}</p>
                            <h5 class="card-title">Nama Lapangan : {{$item->nama_lapangan}}</h5>
                            <h5 class="card-title">Lokasi Lapangan : {{$item->lokasi_lapangan}}</h5>
                        </div>
                    </div>
                </a>
              </div>
            @endforeach
          </div>
        </div>                                                                                      
      @else
          <div class="col-md-12">
            <h1 class="text-center fw-bold">Belum Tersedia</h1>
          </div>
      @endif
      
    </div>
  </section>
  
    
@endsection