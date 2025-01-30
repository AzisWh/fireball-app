<!-- resources/views/admin/layout/home.blade.php -->
@extends('miminussc.layout.layout')

@section('title', 'Tambah Booking Ussc')

@section('content')
<div class="container">
    <h1>Tambah Booking</h1>

    <form action="{{ route('miminussc.tambahSewa') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="user_id">Select User</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="pilih">pilih penguna</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} - {{ $user->email }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="lapangan_tempat_id">Tempat Lapangan</label>
            <select name="lapangan_tempat_id" id="lapangan_tempat_id" class="form-control" required>
                <option value="pilih">pilih lapangan</option>
                @foreach($lapangan as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lapangan }} - {{ $item->lokasi_lapangan }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="kategori">Kategori Lapangan</label>
            <select name="kategori" id="kategori" class="form-control" required>
                <option value="pilih">pilih kategori</option>
                <option value="futsal">Futsal</option>
                <option value="basket">Basket</option>
                <option value="voli">Voli</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jam_mulai">Jam Pakai</label>
  
            <div class="d-flex" id="container-jam" style="gap: 1rem; flex-wrap: wrap;">
        
            </div>
  
        </div>
    
        <button type="submit" class="btn btn-primary">Add Booking</button>
    </form>
</div>
@endsection

@push('myscript')
  <script>
    $(document).ready(function() {
      // const tax = 4000;

      function get_jam() {
        if ($("#lapangan_tempat_id").val() === "pilih") {
          Swal.fire({
            icon: 'warning',
            title: 'Lapangan Belum Dipilih',
            text: 'Harap pilih lapangan terlebih dahulu untuk melihat jam yang tersedia.',
          });
          return; 
        }

        console.log($("#lapangan_tempat_id").val(), $("#tanggal").val());
        $.ajax({
          url: "{{ route('miminussc.jam') }}",
          cache: false,
          data: {
            lapangan_tempat_id: $("#lapangan_tempat_id").val(),
            tanggal: $("#tanggal").val(),
          },
          success: function(response){
            console.log(response);
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
