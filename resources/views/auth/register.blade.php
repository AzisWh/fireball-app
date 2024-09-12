@extends('user.layout.app')

@section('content')

  <!-- Hero Section -->
  <section class="hero-section inner-page">
    <div class="wave">
      <svg width="1920px" height="265px" viewBox="0 0 1920 265" version="1.1" xmlns="http://www.w3.org/2000/svg">
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
              <h1 data-aos="fade-up" data-aos-delay="">Register Page</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

  <!-- Register Section -->
  <section class="mt-5">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5" data-aos="fade-right">
          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" data-aos="fade-left">
          <form action="{{ route('register') }}" method="POST">
            @csrf
            <!-- Name input -->
            <div class="form-outline mb-4">
              <input type="name" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror"
                placeholder="Nama" value="{{ old('name') }}" />
              <label class="form-label" for="name">Nama</label>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                placeholder="Enter a valid email address" value="{{ old('email') }}" />
              <label class="form-label" for="email">Email address</label>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                placeholder="Enter password" />
              <label class="form-label" for="password">Password</label>
              @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <!-- Confirm Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-lg"
                placeholder="Confirm password" />
              <label class="form-label" for="password-confirm">Confirm Password</label>
            </div>

            <!-- Submit Button -->
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? 
                <a href="/login" class="link-danger">Login</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection
