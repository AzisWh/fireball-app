@extends('user.layout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section class="hero-section inner-page">
    
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up"  data-aos-delay="">Raga Rent</h1>
              <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- ======= Home Section ======= -->

  <div class="container mt-3">
    <div class="row">
        @if (count($katlap)>0)
        @foreach ($katlap as $item)
        <div class="col-md-4">
                <a href="{{ route("user.lapangan")}}?kategori_id={{$item->id}}">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->jenis_lapangan }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        @else
            <div class="col-md-12">
                <h1 class="text-center fw-bold">BELUM ADA LAPANGAN</h1>
            </div>
        @endif
       
    </div>
  </div>
  
    
@endsection