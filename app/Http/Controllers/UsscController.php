<?php

namespace App\Http\Controllers;

use App\Models\form_usc;
use App\Models\FormUssc;
use App\Models\UsscModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsscController extends Controller
{
    public function index(){
        $lapangan = UsscModel::all();
        $riwayat = [];
        if (Auth::check()) {
            $riwayat = FormUssc::where('user_id', Auth::id())->with('lapangan')->get();
        }
        return view('user.page.ussc.index', compact('lapangan','riwayat'));
    }

    public function sewaussc(){
        $lapangan = UsscModel::all();
        return view('user.page.ussc.sewaussc', compact('lapangan'));
    }

    public function ussc_jam(Request $request)
    {
        $request->validate([
            'lapangan_tempat_id' => 'required|exists:ussc_lapangans,id',
            'tanggal' => 'required|date',
        ]);

        $lapangan = UsscModel::find($request->lapangan_tempat_id);

        $bookings = FormUssc::where('lapangan_tempat_id', $request->lapangan_tempat_id)
            ->where('tanggal', $request->tanggal)
            ->pluck('jam') 
            ->flatten() 
            ->toArray();

        $newJam = [];
        foreach ($bookings as $jam_str) {
            $jam2 = json_decode($jam_str);
            foreach ($jam2 as $j) {
                $newJam[] = $j;
            }
        }
        
        // 8-19
        $jamOperasional = range(8, 22);

        $jamData = [];
        foreach ($jamOperasional as $jam) {
            $jamData[] = [
                'jam' => $jam,
                'tersedia' => !in_array($jam, $newJam), 
                'harga' => $lapangan->harga_lapangan_per_jamnya,
                'mock_harga' => number_format($lapangan->harga_lapangan_per_jamnya / 1000, 0), 
            ];
        }

        return response()->json(['harga' => $jamData]);
    }

    public function pesanUssc(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'lapangan_tempat_id' => 'required|exists:ussc_lapangans,id', 
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'jam' => 'required|array', 
            'ktm' => 'required|file', 
        ]);

        $login = Auth::user();

        if($request->hasFile('ktm')) {
            $originalName = $request->file('ktm')->getClientOriginalName();
            $path = $request->file('ktm')->storeAs('KtmFile', $originalName, 'public');
            $validated['ktm'] = $path;
        }

        FormUssc::create([
            'user_id' => $login->id,
            'email' => $login->email,
            'phone_number' => $login->phone_number,
            'lapangan_tempat_id' => $validated['lapangan_tempat_id'],
            'tanggal' => $validated['tanggal'],
            'jam' => json_encode($validated['jam']),
            'ktm' => $originalName,
            'status' => 'PENDING', 
            'kategori' => $validated['kategori'],
        ]);

        // dd($pesanUssc);
        

        return redirect()->route('ussc.index')->with('success', 'Berhasil melakukan pemesanan, tunggu konfirmasi admin');
    }


}
