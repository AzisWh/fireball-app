<!-- resources/views/admin/mitras/index.blade.php -->
@extends('user.layout.app')

@section('content')

<section class="hero-section inner-page">
   

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up"  data-aos-delay="">Riwayat Transaksi<b></b> </h1>
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Transaksi Lapangan</h1>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Invoice</th>
                    <th>Tanggal Booking</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->invoice }}</td>
                    <td>{{ $d->tanggal_booking }}</td>
                    <td>{{ 'Rp. '.number_format($d->total_harga) }}</td>
                    <td>{{ $d->status }}</td>
                    <td>
                        @if($d->status === 'PENDING')
                            <a target="__blank" href="{{ $d->link }}" class="btn btn-sm btn-warning">Bayar Sekarang</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  </section>
</section>

@endsection
