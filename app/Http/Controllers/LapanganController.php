<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use App\Models\Lapangan;
use App\Models\LapanganTempat;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangans = Lapangan::with('mitra','kategori')->get();
        return view('admin.lapangan.index', compact('lapangans'));
    }

    public function create()
    {
        $mitras = Mitra::all();
        $jenislap = KategoriLapangan::all();
        return view('admin.lapangan.create', compact('mitras','jenislap'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mitra_id' => 'required',
            'nama_lapangan' => 'required',
            'jumlah_lapangan' => 'required|integer',
            'harga_lapangan_per_jamnya' => 'required|numeric',
            'lokasi_lapangan' => 'required',
            'jenis_id' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $lapangan = Lapangan::create($request->all());
            for ($i = 0; $i < $request->jumlah_lapangan; $i++) {
                $inc_lapangan = $i + 1;
                LapanganTempat::create([
                    'lapangan_id' => $lapangan->id,
                    'nama_tempat' => "Lapangan {$inc_lapangan}",
                ]);
            }

            DB::commit();
            Alert::success('Berhasil', 'Lapangan berhasil ditambahkan.');
            return redirect()->route('lapangan.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan lapangan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(Lapangan $lapangan)
    {
        $mitras = Mitra::all();
        $jenislap = KategoriLapangan::all();
        return view('admin.lapangan.edit', compact('lapangan', 'mitras','jenislap'));
    }

    public function update(Request $request, Lapangan $lapangan)
    {
        $request->validate([
            'mitra_id' => 'required',
            'nama_lapangan' => 'required',
            'jumlah_lapangan' => 'required|integer',
            'harga_lapangan_per_jamnya' => 'required|numeric',
            'lokasi_lapangan' => 'required',
            'jenis_id' => 'required',
        ]);

        try {
            $lapangan->update($request->all());
            Alert::success('Berhasil', 'Lapangan berhasil diperbarui.');
            return redirect()->route('lapangan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui lapangan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(Lapangan $lapangan)
    {
        
        try {
            $lapangan->lapanganTempats()->delete();
            // $lapangan->mitra()->delete();
            // $lapangan->kategori()->delete();
            // $lapangan->hargaoption()->delete();
            $lapangan->delete();

            Alert::success('Berhasil', 'Lapangan berhasil dihapus.');
            return redirect()->route('lapangan.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus lapangan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
