<?php

namespace App\Http\Controllers;

use App\Models\BattleTransaksi;
use App\Models\Registration;
use App\Models\TransaksiLapangan;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function index() {
        $data['transaksis'] = TransaksiLapangan::where('user_id', auth()->user()->id)->get();
        $data['battleTransaksis'] = BattleTransaksi::where('user_id', auth()->user()->id)->get();
        $data['registrations'] = Registration::with(['activity', 'activity.event'])
            ->where('user_id', auth()->user()->id)
            ->get();

        return view('user.dashboard.index', $data);
    }
}
