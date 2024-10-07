<?php

namespace App\Http\Controllers;

use App\Models\FormUssc;
use Illuminate\Http\Request;

class AdminUsscController extends Controller
{
    public function index(){
        return view('miminussc.index');
    }

    public function listsewa(){
        $listsewa = FormUssc::with('user', 'lapangan')->get();
        return view('miminussc.listsewa', compact('listsewa'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:PENDING,ACCEPTED',
        ]);

        $formUssc = FormUssc::findOrFail($id);
        $formUssc->update(['status' => $validated['status']]);

        return redirect()->route('miminussc.listsewa')->with('success', 'Status berhasil diperbarui');
    }
}
