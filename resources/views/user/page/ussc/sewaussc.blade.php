@extends('user.layout.app')

@section('content')

  <!-- ======= Hero Section ======= -->
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
                <h1 data-aos="fade-up"  data-aos-delay="">USSC RENT FORM</h1>
            </div>
            </div>
        </div>
        </div>
    </div>
  </section>  


  <section class="section">
    <div class="container pt-4">
      
      <form action="{{ route('ussc.pesan') }}" method="POST" enctype="multipart/form-data">
      {{-- <form action="#" method="POST"> --}}
        @csrf
        <div class="form-group">
            <label for="lapangan_tempat_id" class="text-black fw-bold">Tempat Lapangan</label>
            <select name="lapangan_tempat_id" id="lapangan_tempat_id" class="form-control" required>
                @foreach($lapangan as $item)
                <option value="{{ $item->id }}">{{ $item->nama_lapangan }} - {{ $item->lokasi_lapangan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="kategori" class="text-black fw-bold">Kategori Lapangan</label>
          <select name="kategori" id="kategori" class="form-control" required>
              <option value="pilih">Pilih Kategori Lapangan</option>
              <option value="futsal">Futsal</option>
              <option value="basket">Basket</option>
              <option value="voli">Voli</option>
          </select>
        </div>

        <div class="form-group">
          <label for="tanggal" class="text-black fw-bold">Tanggal</label>
          
          <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="form-group ">
          <label for="jam_mulai" class="text-black fw-bold">Jam Mulai</label>
          <p>Pilih tanggal dan tunggu sampai form checkbox untuk memilih tanggal dan jam muncul!</p>
          <div class="d-flex justify-content-center justify-content-md-start" id="container-jam" style="gap: 1rem; flex-wrap: wrap;">
      
          </div>

        </div>
        <div class="form-group">
          <label for="ktm " class="text-black fw-bold">Upload KTM</label>
          <input type="file" id="ktm" class="form-control" name="ktm" required>
        
          <div class="mt-2 ">
            <p class="text-black fw-bold">Format Pengumpulan File</p>
            <div class="text-black">
              <li>
                Kamu wajib mengikuti format yang terlampir sebagai berikut dengan minimal <b>2 data</b> sebagai penanggung jawab.
              </li>
              <li>
                Setelah mengisi formulir, pastikan Kamu mengupload file dokumen dalam format PDF.
              </li>
              <li>
                InRaga akan melakukan pengecekan terhadap dokumen yang Kamu kirimkan. Jika ada kekurangan, kami akan menghubungi kamu melalui email atau nomor telepon yang tercantum.
              </li>
            </div>
            <img class="img_gallery" src="{{ asset('assets/img/datamhs.png') }}" alt="Contoh format KTM" style="width: 100%; max-width: 550px;">
          </div>
        </div>
        
        <div class="d-flex justify-content-center justify-content-md-start">
        <button type="submit" class="btn btn-primary mt-3">Ajukan Penyewaan</button>

        </div>
      </form>
      
    </div>
  </section>
  
@endsection

@push('myscript')
  <script>
    $(document).ready(function() {
      // const tax = 4000;

      function get_jam() {
        $.ajax({
          url: "{{ route('ussc.jam') }}",
          cache: false,
          data: {
            lapangan_tempat_id: $("#lapangan_tempat_id").val(),
            tanggal: $("#tanggal").val(),
          },
          success: function(response){
            $('#container-jam').empty();
            const unavailableStyle = `style="background-color: #ff8d8d;"`;

            let container = '';
            $.each(response.harga, function(index, item) {
              let input = '';
              if (item.tersedia) input = `<input type="checkbox" name="jam[]" id="jam-${index}" value="${item.jam}" class="jam-checkbox">`;
              container += `
                <div class="card p-2 text-center" ${!item.tersedia ? unavailableStyle : ''}>
                  ${input}
                  <label for="jam-${index}">${item.jam}:00</label>
                  <label for="jam-${index}">${item.mock_harga}(free)</label>
                </div>
              `;
            });
            console.log(container);
            $('#container-jam').append(container);
            calculateTotal(); // Recalculate total in case of pre-selected values
          },
            error: function(jqXHR, textStatus, errorThrown) {
            console.error("Error fetching data: " + textStatus, errorThrown);
          
          }
        });
      };

      function calculateTotal() {
        let total = 0;
        $('.jam-checkbox:checked').each(function() {
          let value = $(this).val().split('-');
          total += parseInt(value[1]);
        });
        // total += tax;
        $('#total_harga').text(`(Rp. ${total})`);
        $('#status').text('(Total harga + 4000 (biaya layanan))');
      }

      $(document).on('change', '.jam-checkbox', function() {
        calculateTotal();
      });

      $('#tanggal').on('change', function() {
        get_jam();
      });

      $('#lapangan_tempat_id').on('change', function() {
        get_jam();
      });
    });
  </script>
@endpush
