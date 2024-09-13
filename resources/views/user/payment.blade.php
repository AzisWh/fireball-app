@extends('user.layout.app')

@section('content')
    <div class="container">
        <h2>Detail Pembayaran untuk {{ $activity->name }}</h2>
        <p>Harga: Rp {{ number_format($activity->price, 2) }}</p>

        <form action="{{ route('activity.payment.process', $activity->id) }}" method="POST" enctype="multipart/form-data">
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
