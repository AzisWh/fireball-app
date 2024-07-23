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

        $input = $request->all();

        if ($image = $request->file('image')) {
            $originalName = $image->getClientOriginalName();
            $path = $image->storeAs('mitra', $originalName, 'public');
            $input['image'] = $originalName;
        }

        Mitra::create($input);

        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
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
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            $originalName = $image->getClientOriginalName();
            $path = $image->storeAs('mitra', $originalName, 'public');
            $input['image'] = $originalName;
        } else {
            unset($input['image']);
        }
    
        $mitra->update($input);

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully.');
    }

    public function destroy(Mitra $mitra)
    {
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully.');
    }
}
