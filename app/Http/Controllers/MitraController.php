<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::all();
        return view('admin.mitra.index', compact('mitras'));
    }

    public function showMitra(Mitra $mitra){

        $mitra = Mitra::all();
        return view('user.page.mitra.mitra', compact('mitra'));
    }

    public function detail($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('user.page.mitra.detail', compact('mitra'));
    }   

    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namamitra' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail' => 'nullable|string',
            'contact_person' => 'nullable|string'
        ]);

       
        try {
            $input = $request->all();

            if ($image = $request->file('image')) {
                $originalName = $image->getClientOriginalName();
                $path = $image->storeAs('mitra', $originalName, 'public');
                $input['image'] = $originalName;
            }

            Mitra::create($input);

            Alert::success('Berhasil', 'Mitra berhasil dibuat');
            return redirect()->route('mitra.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat membuat mitra: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function edit(Mitra $mitra)
    {
        return view('admin.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'namamitra' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'detail' => 'nullable|string',
            'contact_person' => 'nullable|string'
        ]);
    
        try {
            $input = $request->all();
    
            if ($image = $request->file('image')) {
                $originalName = $image->getClientOriginalName();
                $path = $image->storeAs('mitra', $originalName, 'public');
                $input['image'] = $originalName;
            } else {
                unset($input['image']);
            }
    
            $mitra->update($input);
    
            Alert::success('Berhasil', 'Mitra berhasil diperbarui');
            return redirect()->route('mitra.index');
        } catch (\Exception $e) {
            Alert::error('Gagal', 'Terjadi kesalahan saat memperbarui mitra: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

    }

    public function destroy(Mitra $mitra)
    {
        try {
            $mitra->lapangans()->delete();
            
            $mitra->delete();
    
            Alert::success('Mitra Berhasil terhapus');
            return redirect()->route('mitra.index');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                Alert::error('Mitra tidak dapat dihapus karena masih terhubung dengan lapangan');
                return redirect()->route('mitra.index');
            }
    
            throw $e;
        }
    }
}
