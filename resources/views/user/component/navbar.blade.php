<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="logo">
        <h1>
          <a href="#"><img src="assets/img/logo3d.png" alt="" class="img-fluid" />InRaga</a>
        </h1>
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="{{ request()->is('/') ? 'active' : ''}}" href="/">Home</a></li>
          <li><a class="{{ request()->is('/product') ? 'active' : ''}}" href="/product">Product
          </a></li>
          <!-- <li><a href="blog.html">Blog</a></li> -->
          <li><a class="{{ request()->is('/gallery') ? 'active' : ''}}" href="/gallery">Gallery</a></li>
          <li><a class="{{ request()->is('/event') ? 'active' : ''}}" href="/event">Event</a></li>
          <li><a class="{{ request()->is('/mitra') ? 'active' : ''}}" href="/mitra">Jadi Mitra Kami</a></li>
          <li><a class="{{ request()->is('/user/sewa') ? 'active' : ''}}" href="/user/sewa">Sewa</a></li>
              @if (auth()->check())
              <li><a class="{{ request()->is('/user/dashboard') ? 'active' : ''}}" href="/user/dashboard">Riwayat</a></li>
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
              @else
                  <li>ehehenak</li>
              @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->