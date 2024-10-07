<!-- resources/views/admin/components/sidebar.blade.php -->
<div class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('miminussc.home') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('miminussc.listsewa') }}">
                    <span data-feather="file"></span>
                    List Penyewaan
                </a>
            </li>
            
        </ul>
    </div>
</div>
