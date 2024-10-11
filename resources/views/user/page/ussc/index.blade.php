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
                <h1 data-aos="fade-up"  data-aos-delay="">Udinus Satria Sport Center</h1>
            </div>
            </div>
        </div>
        </div>
    </div>
  </section>  


  <section class="section mt-5">
    <div class="container">
      
      @if (count($lapangan))
        <div class="filterSearch">
          <p style="margin-top: 20px; color: #000; font-size:24px;">Lapangan Tersedia</p>
        </div>
        <div class="cardEvent">
          <div class="row">
            @foreach ($lapangan as $item)
              <div class="col-md-4 col-sm-6">
                {{-- <a href="{{ route('user.lapangan_jam', $item->id) }}"> --}}
                <a href="{{route('ussc.sewa')}}">
                    <div class="card mx-auto" style="width: 24rem;">
                        {{-- <img src="{{ asset('assets/img/event/poster.jpeg') }}" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <p>Nama Mitra : {{$item->mitra}}</p>
                            <h5 class="card-title">Nama Lapangan : {{$item->nama_lapangan}}</h5>
                            <h5 class="card-title">Lokasi Lapangan : {{$item->lokasi_lapangan}}</h5>
                            <hr class="border-1 border-black px-3">  
                            <p class="text-center text-danger fw-bolder">Khusus Mahasiswa Udinus</p>
                        </div>
                    </div>
                </a>
              </div>
            @endforeach
            <div class="col-md-4 col-sm-6">
              <h5>Peta Lokasi</h5>
              <a target="_blank" href="https://www.google.com/maps/place/GOR+Satria/@-6.9706321,110.4086703,17z/data=!3m1!4b1!4m6!3m5!1s0x2e70f4b1814e38c9:0x94367a67d8cd1711!8m2!3d-6.9706321!4d110.4112452!16s%2Fg%2F11c548dx__?entry=ttu&g_ep=EgoyMDI0MTAwNS4yIKXMDSoASAFQAw%3D%3D">
                <button class="btn btn-primary">Google Maps</button>
              </a>
              <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.327528032827!2d110.40867027504424!3d-6.970632093029987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4b1814e38c9%3A0x94367a67d8cd1711!2sGOR%20Satria!5e0!3m2!1sid!2sid!4v1728447876990!5m2!1sid!2sid"
                  width="100%" 
                  height="450" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade">
              </iframe>
            </div>
          </div>
        </div>                                                                                      
      @else
          <div class="col-md-12">
            <h1 class="text-center fw-bold">Belum Tersedia</h1>
          </div>
      @endif

      <hr class="border-2 border-black ">

      @auth
        <div class="mt-5">
          <h3>Riwayat Pemesanan</h3>
          @if(count($riwayat))
            <div style="overflow-x: auto">
              <h1>Contact Person : </h1>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lapangan</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Kategori Lapangan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($riwayat as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->lapangan->nama_lapangan }}</td>
                      <td>{{ $item->tanggal }}</td>
                      <td>{{ implode(', ', json_decode($item->jam)) }}</td>
                      <td>{{ $item->kategori }}</td>
                      <td>
                        <span class="badge 
                          @if($item->status == 'PENDING') 
                            bg-warning text-dark 
                          @else 
                            bg-primary text-white 
                          @endif">
                          {{ ucfirst($item->status) }}
                        </span>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <p>Tidak ada pemesanan sebelumnya.</p>
          @endif
        </div>
      @else
        <p>Tidak ada riwayat, silahkan login atau register terlebih dahulu</p>
      @endauth
      
    </div>
  </section>
  
    
@endsection