<?php

namespace App\Http\Controllers;

use App\Models\KategoriLapangan;
use App\Models\Lapangan;
use App\Models\LapanganTempat;
use App\Models\LapanganHarga;
use App\Models\TransaksiLapangan;
use App\Models\TransaksiLapanganDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Xendit\Configuration;
use Xendit\Invoice\InvoiceApi;
use Xendit\Invoice\CreateInvoiceRequest;

class LandingController extends Controller
{
    public function __construct() {
        Configuration::setXenditKey(config('app.xendit_api_key'));
    }

    public function index(){

        $katlap = KategoriLapangan::all();
        return view('user.page.sewa', compact('katlap'));
    }

    public function detail(){
        $kategori_id = request()->get('kategori_id');
        $kategori_name = KategoriLapangan::find($kategori_id)->jenis_lapangan;
        $detail = Lapangan::when($kategori_id, function ($q) use ($kategori_id) {
            $q->where('jenis_id', $kategori_id);
        })
        ->get();
        return view('user.page.lapangan',compact('detail','kategori_name'));
    }

    public function lapangan_jam($lapangan_id){
        $lapangan = Lapangan::find($lapangan_id);
        $tempats = LapanganTempat::where('lapangan_id', $lapangan_id)->get();

        return view('user.page.sewa_lapangan', compact('lapangan', 'tempats'));
    }

    public function data_jam(Request $request) {
        $lapangan_tempat_id = $request->get('lapangan_tempat_id');
        $tanggal = $request->get('tanggal');

        $tempat = LapanganTempat::find($lapangan_tempat_id);
        $harga = (float) $tempat->lapangan->harga_lapangan_per_jamnya;
        
        $custom_harga = LapanganHarga::where('lapangan_tempat_id', $lapangan_tempat_id)
            ->whereDate('tanggal', $tanggal)
            ->get();
        $transaksi = TransaksiLapanganDetail::query()
            ->whereDate('tanggal_booking', $tanggal)
            ->where('lapangan_tempat_id', $lapangan_tempat_id)
            ->whereHas('transaksi', function ($transaksi) {
                $transaksi->where('status', 'PAID');
            })
            ->get();

        $jam = [];
        for($i = 0; $i < 24;$i++) {
            $jam_string = sprintf("%02d", $i);
            $custom = $custom_harga->where('jam', $jam_string)->first();
            $end_harga = $custom ? $custom->harga : $harga;
            $jam[] = [
                'jam' => $jam_string,
                'harga' => $end_harga,
                'mock_harga' => $end_harga / 1000,
                'tersedia' => $transaksi->where('jam', $jam_string)->first() ? false : true,
            ];
        }

        return response()->json([
            'harga' => $jam,
        ]);
    }

    public function pesan(Request $request) {
        $login = Auth::user();
        DB::beginTransaction();

        $transaksi = TransaksiLapangan::create([
            'invoice' => "inv-".time(),
            'external_id' => (string) Str::uuid(),
            'user_id' => $login->id,
            'tanggal_booking' => $request->tanggal,
            'total_harga' => 0,
            'status' => "PENDING",
            'link' => "google.com",
        ]);

        $total_harga = 0;
        $detail = [];
        foreach($request->jam as $jam) {
            $jamharga = \explode('-', $jam);
            $j = $jamharga[0];
            $h = $jamharga[1];
            $total_harga += (float) $h;

            $data_detail = [
                'transaksi_lapangan_id' => $transaksi->id,
                'lapangan_tempat_id' => $request->lapangan_tempat_id,
                'tanggal_booking' => $request->tanggal,
                'jam' => $j,
                'harga' => (float) $h,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
            $detail[] = $data_detail;
        }

        // XENDIT REQUEST
        $apiInstance = new InvoiceApi();
        $create_invoice_request = new CreateInvoiceRequest([
            'external_id' => $transaksi->external_id,
            'description' => $transaksi->invoice,
            'amount' => $total_harga + 4000,
            'invoice_duration' => 172800,
            'currency' => 'IDR',
            'reminder_time' => 1
        ]);
        $result_xendit = $apiInstance->createInvoice($create_invoice_request);

        TransaksiLapangan::where('id', $transaksi->id)->update([
            'total_harga' => $total_harga,
            'link' => $result_xendit['invoice_url'],
        ]);
        TransaksiLapanganDetail::insert($detail);
        DB::commit();

        return redirect()->route('user.dashboard')->with('success', 'Berhasil melakukan pemesanan jam');
    }
}
