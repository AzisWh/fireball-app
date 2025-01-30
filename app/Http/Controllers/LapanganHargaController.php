<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use App\Models\Lapangan;
use App\Models\LapanganHarga;
use App\Models\LapanganTempat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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

        
        try {
            LapanganHarga::create($request->all());
            Alert::success('Berhasil', 'Harga Lapangan berhasil ditambahkan.');
            return redirect()->route('hargalap.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menambahkan harga lapangan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
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

        try {
            $hargalap->update($request->all());
            Alert::success('Berhasil', 'Harga Lapangan berhasil diperbarui.');
            return redirect()->route('hargalap.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui harga lapangan: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function destroy(LapanganHarga $hargalap)
    {
        try {
            $hargalap->delete();
            Alert::success('Berhasil', 'Harga Lapangan berhasil dihapus.');
            return redirect()->route('hargalap.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat menghapus harga lapangan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}
