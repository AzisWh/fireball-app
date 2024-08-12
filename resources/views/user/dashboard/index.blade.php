<!-- resources/views/admin/mitras/index.blade.php -->
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
                <h1 data-aos="fade-up"  data-aos-delay="">Riwayat</h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
            </div>
        </div>
        </div>
    </div>
  </section>  


  <section class="section">
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Transaksi Lapangan</h1>
        </div>
        
        @if ($transaksis->isEmpty())
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
               
                <tr>
                    <td>
                        <p>Belum Ada Transaksi</p>
                    </td>
                </tr>
               
            </tbody>
        </table>
        @else
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $d->invoice }}</td>
                        <td>{{ $d->tanggal_booking }}</td>
                        <td>{{ 'Rp. '.number_format($d->total_harga ) }}</td>
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
        @endif
    </div>
  </section>
</section>

@endsection
