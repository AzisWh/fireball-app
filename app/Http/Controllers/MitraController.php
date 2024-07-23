<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::all();
        return view('admin.mitra.index', compact('mitras'));
    }

    public function showMitra(Mitra $mitra){

        $mitra = Mitra::all();
        return view('user.page.mitra', compact('mitra'));
    }

    public function create()
    {
        return view('admin.mitra.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namamitra' => 'required'
        ]);

        Mitra::create($request->all());

        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
    }

    public function edit(Mitra $mitra)
    {
        return view('admin.mitra.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $request->validate([
            'namamitra' => 'required'
        ]);

        $mitra->update($request->all());

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully.');
    }

    public function destroy(Mitra $mitra)
    {
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully.');
    }
}
