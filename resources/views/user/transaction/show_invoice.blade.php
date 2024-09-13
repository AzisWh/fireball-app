@extends('user.layout.app')

@section('content')
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">{{ $invoice->activity->name }}</h3>
                        <p><strong>Deskripsi:</strong> {{ $invoice->activity->description }}</p>
                        <p><strong>Harga:</strong> Rp {{ number_format($invoice->amount, 2) }}</p>
                        <p><strong>Status:</strong> {{ $invoice->status }}</p>
                        
                        <hr>

                        <h5>Detail Form:</h5>
                        <p><strong>Text:</strong> {{ $invoice->form_text }}</p>
                        @if($invoice->form_image)
                            <p><strong>Image:</strong></p>
                            <img src="{{ asset('storage/' . $invoice->form_image) }}" alt="Form Image" class="img-fluid">
                        @endif

                        <hr>

                        <h5>Link Pembayaran:</h5>
                        <a href="{{ $invoice->payment_url }}" target="_blank" class="btn btn-primary">Bayar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
