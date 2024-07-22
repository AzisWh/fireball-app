<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use App\Models\Lapangan;
use App\Models\LapanganTempat;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        DB::beginTransaction();

        $lapangan = Lapangan::create($request->all());
        for($i=0;$i<$request->jumlah_lapangan;$i++) {
            $inc_lapangan = $i+1;
            LapanganTempat::create([
                'lapangan_id' => $lapangan->id,
                'nama_tempat' => "Lapangan {$inc_lapangan}",
            ]);
        }

        DB::commit();
        // dd($request->all());

        return redirect()->route('lapangan.index')->with('success', 'Lapangan created successfully.');
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

        $lapangan->update($request->all());

        return redirect()->route('lapangan.index')->with('success', 'Lapangan updated successfully.');
    }

    public function destroy(Lapangan $lapangan)
    {
        // Hapus data terkait di tabel lapangan_tempats
        $lapangan->lapanganTempats()->delete();
        
        // Hapus data lapangan
        $lapangan->delete();

        return redirect()->route('lapangan.index')->with('success', 'Lapangan deleted successfully.');
    }
}
