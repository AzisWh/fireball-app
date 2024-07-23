<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use App\Models\Lapangan;
use App\Models\LapanganHarga;
use App\Models\LapanganTempat;
use Illuminate\Http\Request;

class LapanganHargaController extends Controller
{
    public function index()
    {
        $hargalap = LapanganHarga::get();
        return view('admin.hargalap.index', compact('hargalap'));
    }

    public function create()
    {
        // $lapangans = Lapangan::all();
        $tempats = LapanganTempat::get();
        return view('admin.hargalap.create', compact('tempats'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lapangan_tempat_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'harga' => 'required|numeric',
        ]);

        
        LapanganHarga::create($request->all());

        return redirect()->route('hargalap.index')->with('success', 'Mitra created successfully.');
    }

    public function edit(LapanganHarga $hargalap)
    {
        $lapangans = Lapangan::all();
        $jenislap = LapanganTempat::all();
        return view('admin.hargalap.edit', compact('hargalap', 'jenislap'));
    }

    public function update(Request $request, LapanganHarga $hargalap)
    {
        $request->validate([
            'lapangan_tempat_id' => 'required',
            'tanggal' => 'required',
            'jam' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $hargalap->update($request->all());

        return redirect()->route('hargalap.index')->with('success', 'Harga Lapangan updated successfully.');
    }

    public function destroy(LapanganHarga $hargalap)
    {
        $hargalap->delete();

        return redirect()->route('hargalap.index')->with('success', 'Harga Lapangan deleted successfully.');
    }
}
