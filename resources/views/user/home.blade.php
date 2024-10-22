@extends('user.layout.app')
  

  

  @section('content')
  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-7 text-center text-lg-start" style="width: 500px; margin-right: 150px;">
              <h1 data-aos="fade-right" style="font-size: 55px; margin-top: 45px;">Selamat Datang di <span style="text-decoration: underline;">InRaga</span></h1>
              <p class="mb-5" data-aos="fade-right" data-aos-delay="100" style="font-size: 30px;">Change Your Lifestyle with <span style="font-weight: bold;">InRaga.</span></p>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#download" class="btn btn-outline-white">Get started</a></p>
            </div>
            <div class="col-lg-5">
              <img src="{{ asset('assets/img/inragaPhone.png') }}" alt="Image" class="phone-1" data-aos="fade-right" style="width: 110%;">
            </div>
          </div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  
    <section class="section mt-3">
      <div class="container">

        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-5" data-aos="fade-up">
            <h2 class="text-center">Mengapa Memakai InRaga</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
            <div class="feature-1 text-center">
              <div class="">
                <img class="card-img-top" src="{{ asset('assets/img/ikonset/mudahPraktis.png') }}" style="
                width: 300px;" alt="Card image cap">
              </div>
              <!-- <div class="wrap-icon icon-1">
                <i class="bi bi-people"></i>
              </div> -->
              <h3 class="mt-5" style="font-size: 23px; font-weight: thin;">Terpusat</h3>
              <p>Cari Kompetisi Sports / E-Sport dala satu aplikasi di ragaBattle</p>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
            <div class="feature-1 text-center">
              <div class="">
                <img class="card-img-top" src="{{ asset('assets/img/ikonset/mencariLapangan.png') }}" style="
                width: 300px;" alt="Card image cap" >
              </div>
              <!-- <div class="wrap-icon icon-1">
                <i class="bi bi-people"></i>
              </div> -->
              <h3 class="mt-5" style="font-size: 23px; font-weight: thin;">Efisien</h3>
              <p>Nonton pertandingan lebih mudah dengan ragaTicket</p>
            </div>
          </div>
          <div class="col-md-4" data-aos="fade-up" data-aos-delay="">
            <div class="feature-1 text-center">
              <div class="">
                <img class="card-img-top" src="{{ asset('assets/img/ikonset/pilihanLapangan.png') }}" alt="Card image cap" style="
                width: 300px;">
              </div>
              <!-- <div class="wrap-icon icon-1">
                <i class="bi bi-people"></i>
              </div> -->
              <h3 class="mt-5" style="font-size: 23px; font-weight: thin;">Kolaboratif</h3>
              <p>Buat kompetisi dan kolaborasi dengn kami untuk mendapatkan sponsor !</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- Pilihan Olahraga Section Start -->
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-5" data-aos="fade-up">
        <h2  class="text-center" style="
        margin-top: 85px;" >Pilihan Olahraga</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_pilihan " src="{{ asset('assets/img/pilihanOlahraga/sepakbola.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_pilihan" src="{{ asset('assets/img/pilihanOlahraga/basket.png') }}" alt="basket" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_pilihan" src="{{ asset('assets/img/pilihanOlahraga/badminton.png') }}" alt="badminton" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_pilihan" src="{{ asset('assets/img/pilihanOlahraga/renang.png') }}" alt="renang" width="80%">
        </div>
      </div>
    <!-- Pilihan Olahraga Section End -->
    <!-- Produk Start -->
      <div class="row justify-content-center text-center mb-5" style="margin-top: 100px;">
        <div class="col-md-5" data-aos="fade-up">
          <h2 class="text-center">Produk Kami</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10">

          <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="review ">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-md-6 ms-auto order-2">
                        <h2 class="mb-4">ragaRent</h2>
                        <p class="mb-4">Persewaan lapangan olahraga di Jawa Tengah. di dalam fitur ini pelanggan dapat memesan melihat ketersedian jadwal jam sewa, melihat review dari pengguna serta sewa lapangan sesuai dengan keinginan yang dilakukan secara online menggunakan transaksi digital. </p>
                        <p><a href="#download" class="btn btn-primary">Download Now</a></p>
                      </div>
                      <div class="col-md-4 text-center" data-aos="fade-right">
                        <img src="{{ asset('assets/img/product/ragaRent.jpg') }}" alt="ragaRent" class="img-fluid" style=" width: 220px; border-radius: 15px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review ">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-md-6 ms-auto order-2">
                        <h2 class="mb-4">ragaBattle</h2>
                        <p class="mb-4">Menyediakan informasi kompetisi olahraga di Jawa Tengah. Pelanggan dapat mengetahui informasi terkait kompetisi di bidang olahraga, info seputar olahraga di Kota Semarang serta info terkait komunitas olahraga tertentu.
                        </p>
                        <p><a href="#download" class="btn btn-primary">Download Now</a></p>
                      </div>
                      <div class="col-md-4 text-center" data-aos="fade-right">
                        <img src="{{ asset('assets/img/product/ragaBattle.jpg') }}" alt="ragaBattle" class="img-fluid"style=" width: 220px; border-radius: 15px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review ">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-md-6 ms-auto order-2">
                        <h2 class="mb-4">ragaTrainer</h2>
                        <p class="mb-4">Pencarian trainer olahraga (kerjasama -- ada MoU). Pelanggan dapat mencari informasi serta melakukan pemesanan jasa trainer di bidang olahraga sesuai dengan keinginan, didalam fitur ini juga melampirkan beberapa profil dari trainer hingga sertifikasi yang telah dimiliki oleh para trainer.</p>
                        <p><a href="#download" class="btn btn-primary">Download Now</a></p>
                      </div>
                      <div class="col-md-4 text-center" data-aos="fade-right">
                        <img src="{{ asset('assets/img/product/ragaTrainer.jpg') }}" alt="ragaTrainer" class="img-fluid"style=" width: 220px; border-radius: 15px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review ">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-md-6 ms-auto order-2">
                        <h2 class="mb-4">ragaShop</h2>
                        <p class="mb-4">E-marketplace penjualan perlengkapan olahraga se- Jawa Tengah. Pelanggan dapat melakukan jual atau beli produk UMKM dibidang industri olahraga melalui platform In Raga</p>
                        <p><a href="#download" class="btn btn-primary">Download Now</a></p>
                      </div>
                      <div class="col-md-4 text-center" data-aos="fade-right">
                        <img src="{{ asset('assets/img/product/ragaShop.jpg') }}" alt="ragaShop" class="img-fluid"style=" width: 220px; border-radius: 15px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="review ">
                  <div class="container">
                    <div class="row align-items-center">
                      <div class="col-md-6 ms-auto order-2">
                        <h2 class="mb-4">ragaTicket</h2>
                        <p class="mb-4">Fitur Ticketing yang dapat digunakan dalam pelaksanaan sebuah kegiatan. Pengguna akan mendapatkan E-Ticket yang disertai dengan QR Code yang dapat di scan sebagai bukti masuk ke dalam kegiatan yang berkaitan.</p>
                        <p><a href="#download" class="btn btn-primary">Download Now</a></p>
                      </div>
                      <div class="col-md-4 text-center" data-aos="fade-right">
                        <img src="{{ asset('assets/img/product/ragaTicket.jpg') }}" alt="ragaTicket" class="img-fluid"style=" width: 220px; border-radius: 15px;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    <!-- Produk End -->
    <!-- Gallery Start -->
    <div class="row justify-content-center text-center mb-5" style="margin-top: 100px;">
      <div class="col-md-4">
        <h2 class="text-center">Our Gallery</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_gallery " src="{{ asset('assets/img/Gallery/gallery-1.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_gallery " src="{{ asset('assets/img/Gallery/gallery-2.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_gallery " src="{{ asset('assets/img/Gallery/gallery-3.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_gallery " src="{{ asset('assets/img/Gallery/gallery-4.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_gallery " src="{{ asset('assets/img/Gallery/gallery-5.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
      <div class="col-md-3 mb-3" data-aos="fade-up" data-aos-delay="">
        <div class="feature-1 text-center">
            <img class="img_gallery " src="{{ asset('assets/img/Gallery/gallery-6.png') }}" alt="sepakbola" width="80%">
        </div>
      </div>
     
    <!-- Gallery End -->
    <!-- ======= Testimonials Section ======= -->
    <section class="section border-top border-bottom">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-4">
            <h2 class="text-center"style="
            margin-top: 85px;">Testimonials</h2>
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div class="col-md-7">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="review text-center">
                    <!-- <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p> -->
                    <!-- Testi 1 -->
                    <p class="review-user">
                      <img src="{{ asset('assets/img/person_3.jpg') }}" alt="Image" class=" rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Dewi Rahayu</span>, &mdash; Pekerja Kantoran
                      </span>
                    </p>
                    <img src="{{ asset('assets/img/testi-1.png') }}" class="mb-3" alt="" width="20%">
                    <!-- <h3>Mudah Digunakan</h3> -->
                    <blockquote>
                      <p>"Aplikasi ini sangat mudah digunakan. Saya hanya perlu mengunduhnya, membuat akun, dan dalam hitungan menit, saya sudah bisa mencari dan memesan lapangan olahraga sesuai kebutuhan saya."</p>
                    </blockquote>
                  </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                  <div class="review text-center">
                    <!-- <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p> -->
                    <!-- Testi 2 -->
                    <p class="review-user">
                      <img src="{{ asset('assets/img/person_1.jpg') }}" alt="Image" class=" rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Budi Santoso</span>, &mdash; Penggemar Olahraga
                      </span>
                    </p>
                    <img src="{{ asset('assets/img/testi-3.png') }}" class="mb-3" alt="" width="20%">
                    <!-- <h3>Pilihan Lapangan Banyak</h3> -->
                    <blockquote>
                      <p>"Aplikasi ini memiliki berbagai pilihan lapangan olahraga, mulai dari lapangan sepak bola, basket, tenis, hingga lapangan bulu tangkis. Saya selalu dapat menemukan lapangan yang cocok untuk aktivitas olahraga saya."</p>
                    </blockquote>
                  </div>
                </div><!-- End testimonial item -->
                <div class="swiper-slide">
                  <div class="review text-center">
                    <!-- <p class="stars">
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill"></span>
                      <span class="bi bi-star-fill muted"></span>
                    </p> -->
                    <!-- Testi 3 -->
                    <p class="review-user">
                      <img src="{{ asset('assets/img/person_2.jpg') }}" alt="Image" class=" rounded-circle mb-3">
                      <span class="d-block">
                        <span class="text-black">Andi Saputra</span>, &mdash; Pengguna Aplikasi
                      </span>
                    </p>
                    <img src="{{ asset('assets/img/testi-2.png') }}" class="mb-3" alt="" width="20%">
                    <h3>Excellent App!</h3>
                    <blockquote>
                      <p>"Ketika saya memiliki pertanyaan atau masalah, layanan pelanggan dari aplikasi ini selalu responsif dan membantu saya menyelesaikan masalah tersebut dengan cepat."</p>
                    </blockquote>
                  </div>
                </div><!-- End testimonial item -->


              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endsection


  

</body>

</html>