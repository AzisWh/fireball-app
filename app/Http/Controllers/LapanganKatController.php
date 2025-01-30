<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LapanganKatController extends Controller
{
    public function index()
    {
        $jenislap = KategoriLapangan::all();
        return view('admin.katlap.index', compact('jenislap'));
    }

    public function create()
    {
        return view('admin.katlap.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_lapangan' => 'required'
        ]);

        try {
            KategoriLapangan::create($request->all());
            Alert::success('Sukses', 'Kategori berhasil dibuat.');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat membuat kategori.');
        }

        return redirect()->route('katlap.index');
    }

    public function edit(KategoriLapangan $katlap)
    {
        return view('admin.katlap.edit', compact('katlap'));
    }

    public function update(Request $request, KategoriLapangan $katlap)
    {
        $request->validate([
            'jenis_lapangan' => 'required'
        ]);

        try {
            $katlap->update($request->all());
            Alert::success('Sukses', 'Kategori berhasil diperbarui.');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui kategori.');
        }

        return redirect()->route('katlap.index');
    }

    public function destroy(KategoriLapangan $katlap)
    {
        try {
            $katlap->delete();
            Alert::success('Sukses', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Kategori tidak dapat dihapus karena terhubung dengan data lain.');
        }

        return redirect()->route('katlap.index');
    }
}
