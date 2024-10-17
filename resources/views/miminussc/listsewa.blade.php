<!-- resources/views/admin/layout/home.blade.php -->
@extends('miminussc.layout.app')

@section('title', 'List Penyewaan')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="mt-5">
        <h3>Riwayat Pemesanan</h3>
        
        <form method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-4">
                    <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ request('email') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>

        @if(count($listsewa))
            <div style="overflow-x: auto">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Penyewa</th>
                            <th>Email</th>
                            <th>No Wa</th>
                            <th>Nama Lapangan</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Kategori Lapangan</th>
                            <th>Ktm</th>
                            <th>Status</th>
                            <th>Edit Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listsewa as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->user ? $item->user->name : 'N/A' }}</td>
                                <td>
                                    <a target="_blank" href="mailto:{{ $item->user ? $item->user->email : '#' }}">
                                        {{ $item->user ? $item->user->email : 'N/A' }}
                                    </a>
                                </td>
                                <td>
                                    <a target="_blank" href="https://wa.me/{{ $item->user ? $item->user->phone_number : '#' }}" target="_blank">
                                        {{ $item->user ? $item->user->phone_number : 'N/A' }}
                                    </a>
                                </td>
                                <td>{{ $item->lapangan->nama_lapangan }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ implode(', ', json_decode($item->jam)) }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <a href="{{ asset('storage/KtmFile/'. $item->ktm)}}" target="_blank">
                                        Lihat Ktm
                                    </a>
                                </td>
                                <td>
                                    <span class="badge 
                                        @if($item->status == 'PENDING') 
                                            bg-warning text-dark 
                                        @else 
                                            bg-primary text-white 
                                        @endif">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $item->id }}">
                                        Edit Status
                                    </button>
                                </td>
                                <td>
                                    <form action="{{ route('miminussc.destroy', $item->id) }}" method="POST" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- modal --}}
                            <div class="modal fade" id="editStatusModal{{ $item->id }}" tabindex="-1" aria-labelledby="editStatusLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('miminussc.updateStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editStatusLabel{{ $item->id }}">Update Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <select name="status" class="form-control" required>
                                                        <option value="PENDING" {{ $item->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                                        <option value="ACCEPTED" {{ $item->status == 'ACCEPTED' ? 'selected' : '' }}>ACCEPTED</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>      
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Tidak ada pemesanan</p>
        @endif
    </div>
</div>
@endsection

@push('myscript')
<script>
    function confirmDelete() {
        return confirm('Aksi ini akan menghapus pemesanan secara permanen.');
    }
</script>
@endpush