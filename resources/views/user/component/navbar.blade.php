<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
        <h1>
          <a href="#"><img src="/assets/img/logo3d.png" alt="" class="img-fluid" />InRaga</a>
        </h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="{{ request()->is('/') ? 'active' : ''}}" href="/user/home">Home</a></li>
          <li><a class="{{ request()->is('/user/product') ? 'active' : ''}}" href="/user/product">Product
          </a></li>
          <!-- <li><a href="blog.html">Blog</a></li> -->
          <li><a class="{{ request()->is('/gallery') ? 'active' : ''}}" href="/gallery">Gallery</a></li>
          <li><a class="{{ request()->is('/event') ? 'active' : ''}}" href="/event">Event</a></li>
          <li><a class="{{ request()->is('/mitra') ? 'active' : ''}}" href="/mitra">Jadi Mitra Kami</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Features
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item {{ request()->is('/user/sewa') ? 'active' : ''}}" href="/user/sewa">Raga Rent</a></li>
              <li><a class="dropdown-item" href="#">Raga Battle</a></li>
              <li><a class="dropdown-item" href="#">Raga Ticket</a></li>
              <li><a class="dropdown-item" href="#">Raga Shop</a></li>
              <li><a class="dropdown-item" href="#">Raga Trainer</a></li>
            </ul>
          </li>
              @if (auth()->check())
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item {{ request()->is('/user/dashboard') ? 'active' : ''}}" href="/user/dashboard">Riwayat</a></li>
                  <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  <a class="nav-link" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                      Logout
                  </a>
                  </li>
                </ul>
              </li>
              @else
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    No Account
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item {{ request()->is('/login') ? 'active' : ''}}" href="/login">Login</a></li>
                      <li><a class="dropdown-item {{ request()->is('/register') ? 'active' : ''}}" href="/register">Register</a></li>
                    </ul>
                  </li>
              @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->