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
                            <h1 data-aos="fade-up"  data-aos-delay="">Ormawa Udinus</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  

    <section class="container mt-5">
        <div class="row">
                <div class="col-md-8 d-flex justify-content-center mb-5">
                        <img src="{{ asset('assets/img/mitra/ormawa.png') }}" class="img-fluid" style="width: 500px" alt="udinus">
                </div>
                <div class="col-md-4">
                    <h3>Detail Mitra</h3>
                    <p>BEM FIK, HMTI UDINUS, DKV UDINUS</p>
                    <h4>Contact Person: - </h4>
                    <a href="https://www.instagram.com/bemfikudinus?igsh=YWd3eGg4bnl6MG9i" target="_blank">
                        <button class="btn btn-primary mt-3">Instagram Bem Fik</button>
                    </a>
                    <a href="https://www.instagram.com/hmtiudinus?igsh=MXVmZDRranAwNG9oMQ==" target="_blank">
                        <button class="btn btn-primary mt-3">Instagram HMTI</button>
                    </a>
                    <a href="https://www.instagram.com/hmdkv.udinus?igsh=Y204bnRjZmI1Ym91" target="_blank">
                        <button class="btn btn-primary mt-3">Instagram HMDKV</button>
                    </a>
                </div>  
        </div>
    </section>
@endsection
