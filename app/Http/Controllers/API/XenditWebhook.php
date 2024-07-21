<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TransaksiLapangan;
use Illuminate\Http\Request;

class XenditWebhook extends Controller
{
    public function handleWebhook(Request $request) {
        // Validate the incoming request signature
        TransaksiLapangan::where('external_id', $request->external_id)->update([
            'status' => $request->status,
        ]);

        return response()->json([
            'data' => "payment completed successfully",
            "payload" => $request->all(),
        ]);
    }
}
