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
                <h1 data-aos="fade-up"  data-aos-delay="">Product Page</h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
            </div>
        </div>
        </div>
    </div>
  </section>  

  <section class="section pb-0 my-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5  me-auto">
        <h2 class="mb-5" style="font-size: 50px;">ragaRent</h2>
        <p class="mb-4">Persewaan lapangan olahraga di Jawa Tengah. di dalam fitur ini pelanggan dapat memesan melihat ketersedian jadwal jam sewa, melihat review dari pengguna serta sewa lapangan sesuai dengan keinginan yang dilakukan secara online menggunakan transaksi digital.</p>
        <a href="/user/sewa"><button type="button" class="btn btn-primary">Try Features</button></a>
      </div>
      <div class="col-md-5 justify-content-center text-center" data-aos="fade-left">
        <img src="/assets/img/product/ragaRent.jpg" width="50%" alt="Image" class="img-fluid" style="border-radius: 15px;">
      </div>
    </div>
  </div>
</section>

<section class="section pb-0 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 ms-auto order-2">
        <h2 class="mb-5" style="font-size: 50px;">ragaBattle</h2>
        <p class="mb-4">Menyediakan informasi kompetisi olahraga di Jawa Tengah. Pelanggan dapat mengetahui informasi terkait kompetisi di bidang olahraga, info seputar olahraga di Kota Semarang serta info terkait komunitas olahraga tertentu.</p>
        <a href="#download"><button type="button" class="btn btn-primary">Download</button></a>
      </div>
      <div class="col-md-5 justify-content-center text-center" data-aos="fade-right">
        <img src="/assets/img/product/ragaBattle.jpg" width="50%" alt="Image" class="img-fluid" style="border-radius: 15px;">
      </div>
    </div>
  </div>
</section>

<section class="section pb-0 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5  me-auto">
        <h2 class="mb-5" style="font-size: 50px;">ragaTicket</h2>
        <p class="mb-4">Fitur Ticketing yang dapat digunakan dalam pelaksanaan sebuah kegiatan. Pengguna akan mendapatkan E-Ticket yang disertai dengan QR Code yang dapat di scan sebagai bukti masuk ke dalam kegiatan yang berkaitan.</p>
        <a href="#download"><button type="button" class="btn btn-primary">Download</button></a>
      </div>
      <div class="col-md-5 justify-content-center text-center" data-aos="fade-left">
        <img src="/assets/img/product/ragaTicket.jpg" width="50%" alt="Image" class="img-fluid" style="border-radius: 15px;">
      </div>
    </div>
  </div>
</section>

<section class="section pb-0 my-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5 ms-auto order-2">
        <h2 class="mb-5" style="font-size: 50px;">ragaShop</h2>
        <p class="mb-4">E-marketplace penjualan perlengkapan olahraga se- Jawa Tengah. Pelanggan dapat melakukan jual atau beli produk UMKM dibidang industri olahraga melalui platform In Raga</p>
        <a href="#download"><button type="button" class="btn btn-primary">Download</button></a>
      </div>
      <div class="col-md-5 justify-content-center text-center" data-aos="fade-right">
        <img src="/assets/img/product/ragaShop.jpg" width="50%" alt="Image" class="img-fluid" style="border-radius: 15px;">
      </div>
    </div>
  </div>
</section>

<section class="section pb-0 mb-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-5  me-auto">
        <h2 class="mb-5" style="font-size: 50px;">ragaTrainer</h2>
        <p class="mb-4">Pencarian trainer olahraga (kerjasama -- ada MoU). Pelanggan dapat mencari informasi serta melakukan pemesanan jasa trainer di bidang olahraga sesuai dengan keinginan, didalam fitur ini juga melampirkan beberapa profil dari trainer hingga sertifikasi yang telah dimiliki oleh para trainer.</p>
        <a href="#download"><button type="button" class="btn btn-primary">Download</button></a>
      </div>
      <div class="col-md-5 justify-content-center text-center" data-aos="fade-left">
        <img src="/assets/img/product/ragaTrainer.jpg" width="50%" alt="Image" class="img-fluid" style="border-radius: 15px;">
      </div>
    </div>
  </div>
</section>
</section>

@endsection
