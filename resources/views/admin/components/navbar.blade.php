
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="{{route('admin.home')}}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
      <li class="nav-item menu-open">
        <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-th"></i>
          <p>
            Master
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
              <a class="nav-link" href="{{route('admin.user.index')}}">
                <i class="far fa-circle nav-icon"></i>
                <p>User</p>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('mitra.index') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Mitra</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('lapangan.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lapangan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('katlap.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kategori Lapangan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('hargalap.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Harga Lapangan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('events.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Event</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="btn btn-danger btn-block" type="submit">Logout</button>
        </form>
      </li>
    </ul>
  </nav>