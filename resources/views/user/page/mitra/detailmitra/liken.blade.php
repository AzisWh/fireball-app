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
                            <h1 data-aos="fade-up"  data-aos-delay="">Liken Sport</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <section class="container mt-5">
        <div class="row">
            <div class="col-md-8 d-flex flex-column align-items-center mb-5">
                <img src="{{ asset('assets/img/mitra/lapanganliken.jpeg') }}" class="img-fluid mb-3" style="width: 100%; max-width: 600px;" alt="udinus">
                
            </div>
            <div class="col-md-4">
                <img src="{{ asset('assets/img/mitra/likensport.png') }}" class="img-fluid" style="width: 100%; max-width: 150px;" alt="the champion stadium">
                <h3>Detail Mitra</h3>
                    <p>Liken Sport merupakan fasilitas bulu tangkis yang berlokasi di Ngaliyan, Semarang. Liken Sport beroperasi setiap hari mulai pukul 08:00 hingga 22:00 dan menawarkan lapangan kelas turnamen yang telah di Approve oleh Hariyanto Arbi, pemain bulu tangkis ternama Indonesia.	</p>
                    <h4>Contact Person: - </h4>
                    <a href="https://www.instagram.com/liken.sport?igsh=MWU2amFvOXVoMjU0dw==" target="_blank">
                        <button class="btn btn-primary mt-3">Instagram Mitra</button>
                    </a>
            </div>  
        </div>
    </section>
@endsection
