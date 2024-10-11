@extends('user.layout.app')
    

@section('content')

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
                <h1 data-aos="fade-up"  data-aos-delay="">Login Page</h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
            </div>
        </div>
        </div>
    </div>
  </section>                                  

  <section class="mt-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5" data-aos="fade-right">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                    class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" data-aos="fade-left">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control form-control-lg"
                            placeholder="Enter a valid email address" value="{{ old('email') }}" />
                        <label class="form-label" for="email">Email address</label>
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="password" id="password" name="password" class="form-control form-control-lg"
                            placeholder="Enter password" />
                        <label class="form-label" for="password">Password</label>
                    </div>

                    <!-- Error message for invalid login -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? 
                            <a href="{{ url('/register') }}" class="link-danger">Register</a>
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

@endsection
