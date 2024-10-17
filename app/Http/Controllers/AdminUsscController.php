<?php

namespace App\Http\Controllers;

use App\Mail\BookingUsscNotification;
use App\Mail\StatusUsscUpdatedNotification;
use App\Models\FormUssc;
use App\Models\User;
use App\Models\UsscModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminUsscController extends Controller
{
    public function index(){
        return view('miminussc.index');
    }

    public function listsewa(Request $request){
        $query = FormUssc::with('user', 'lapangan');

        if ($request->has('start_date') && $request->start_date) {
            $query->where('tanggal', '>=', $request->start_date);
        }
        if ($request->has('end_date') && $request->end_date) {
            $query->where('tanggal', '<=', $request->end_date);
        }
        if ($request->has('email') && !empty($request->email)) {
            $query->whereHas('user', function($q) use ($request) {
                $q->where('email', 'like', '%' . $request->email . '%');
            });
        }

        $listsewa = $query->get();
        return view('miminussc.listsewa', compact('listsewa'));
    }

    public function listpemakaian(){
        $users = User::where('role_type', 0)->get();
        $lapangan = UsscModel::all(); 
        return view('miminussc.listpemakaian', compact( 'users', 'lapangan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:PENDING,ACCEPTED',
        ]);

        $formUssc = FormUssc::findOrFail($id);
        $formUssc->update(['status' => $validated['status']]);

        if ($validated['status'] === 'ACCEPTED') {
            Mail::to($formUssc->email)->send(new StatusUsscUpdatedNotification($formUssc));
        }

        return redirect()->route('miminussc.listsewa')->with('success', 'Status berhasil diperbarui');
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

    public function addSewa(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lapangan_tempat_id' => 'required|exists:ussc_lapangans,id',
            'tanggal' => 'required|date',
            'jam' => 'required|array',
        ]);

        FormUssc::create([
            'user_id' => $request->user_id,
            'email' => User::find($request->user_id)->email, 
            'phone_number' => User::find($request->user_id)->phone_number,
            'lapangan_tempat_id' => $request->lapangan_tempat_id,
            'tanggal' => $request->tanggal,
            'jam' => json_encode($request->jam), 
            'status' => 'ACCEPTED',
            'kategori' => $request->kategori, 
            'ktm' => null, 
        ]);

        return redirect()->route('miminussc.listsewa')->with('success', 'Booking updated successfully');
    }

    public function deletePemesanan($id)
    {
        $formUssc = FormUssc::findOrFail($id);
        $formUssc->delete();

        return redirect()->route('miminussc.listsewa')->with('success', 'Booking deleted successfully');
    }
}
