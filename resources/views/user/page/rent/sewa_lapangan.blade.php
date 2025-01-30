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
                <h1 data-aos="fade-up"  data-aos-delay="">Raga Rent</h1>
                <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
            </div>
        </div>
        </div>
    </div>
  </section>  


  <section class="section">
    <div class="container">
      
      <form action="{{ route('user.pesan') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="lapangan_tempat_id">Tempat Lapangan</label>
            <select name="lapangan_tempat_id" id="lapangan_tempat_id" class="form-control" required>
                @foreach($tempats as $item)
                <option value="{{ $item->id }}">{{ $item->lapangan->nama_lapangan }} - {{ $item->nama_tempat }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="jam_mulai">Jam Mulai</label>

          <div class="d-flex" id="container-jam" style="gap: 1rem; flex-wrap: wrap;">
            
          </div>

        </div>
        <div class="form-group">
          <label for="total_harga">Total Harga: </label>
          <p id="total_harga" class="text-black fw-bold">Rp. 0 (belum termasuk biaya layanan)</p>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Pesan Sekarang</button>
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
          url: "{{ route('user.data_jam') }}",
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
              if (item.tersedia) input = `<input type="checkbox" name="jam[]" id="jam-${index}" value="${item.jam}-${item.harga}" class="jam-checkbox">`;
              container += `
                <div class="card p-2 text-center" ${!item.tersedia ? unavailableStyle : ''}>
                  ${input}
                  <label for="jam-${index}">${item.jam}:00</label>
                  <label for="jam-${index}">${item.mock_harga}k</label>
                </div>
              `;
            });
            console.log(container);
            $('#container-jam').append(container);
            calculateTotal(); // Recalculate total in case of pre-selected values
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
