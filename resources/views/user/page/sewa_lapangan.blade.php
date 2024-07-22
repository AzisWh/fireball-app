@extends('user.layout.app')

@section('content')

<!-- ======= Hero Section ======= -->
<section class="hero-section inner-page">
    

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12">
          <div class="row justify-content-center">
            <div class="col-md-7 text-center hero-text">
              <h1 data-aos="fade-up"  data-aos-delay="">Lapangan<b></b> </h1>
              <!-- <p class="mb-5" data-aos="fade-up" data-aos-delay="100">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- ======= Home Section ======= -->

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
          <p id="total_harga" class="text-black fw-bold">Rp. 0 + 4000 (Biaya Layanan)</p>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Pesan Sekarang</button>
      </form>
      
    </div>
  </section>
  
@endsection

@push('myscript')
  <script>
    $(document).ready(function() {
      const tax = 4000;

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
        total += tax;
        $('#total_harga').text(`(${total}k)`);
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
