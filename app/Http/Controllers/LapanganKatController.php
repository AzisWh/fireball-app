<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use Illuminate\Http\Request;

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

        KategoriLapangan::create($request->all());

        return redirect()->route('katlap.index')->with('success', 'Kategori created successfully.');
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

        $katlap->update($request->all());

        return redirect()->route('katlap.index')->with('success', 'Kategori updated successfully.');
    }

    public function destroy(KategoriLapangan $katlap)
    {
        $katlap->delete();

        return redirect()->route('katlap.index')->with('success', 'katlap deleted successfully.');
    }
}
