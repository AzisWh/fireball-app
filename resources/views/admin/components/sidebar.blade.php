<!-- resources/views/admin/components/sidebar.blade.php -->
<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mitra.index') }}">
                    <span data-feather="file"></span>
                    Mitra
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lapangan.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Lapangan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('katlap.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Kategori Lapangan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('hargalap.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Harga Lapangan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('events.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Event
                </a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('events.registeredUsers') }}">
                    <span data-feather="users"></span>
                    Registered Users
                </a>
            </li> --}}
            <!-- Add more links as needed -->
        </ul>
    </div>
</div>
