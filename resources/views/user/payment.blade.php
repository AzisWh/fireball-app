@extends('user.layout.app')

@section('content')
    <section class="hero-section inner-page">
        <div class="wave">
            <!-- SVG content -->
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-md-7 text-center hero-text">
                            <h1 data-aos="fade-up" data-aos-delay=""> {{ $activity->name }}     Payment Page</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <h2>Detail Pembayaran untuk {{ $activity->name }}</h2>
        <p>Harga: Rp {{ number_format($activity->price, 2) }}</p>

        <form action="{{ route('activity.payment.process', $activity->id) }}" method="POST" enctype="multipart/form-data" target="_blank">
            @csrf
            <div class="form-group">
                <label for="form_text">Keterangan Tambahan</label>
                <input type="text" name="form_text" id="form_text" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="form_image">Unggah Bukti Pendukung (Gambar)</label>
                <input type="file" name="form_image" id="form_image" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
        </form>
    </div>
@endsection
