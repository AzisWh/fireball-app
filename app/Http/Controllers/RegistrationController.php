<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BattleTransaksi;
use App\Models\Registration;
use App\Models\TransaksiLapangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Xendit;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceItem;
use Xendit\Invoice\InvoiceApi;

class RegistrationController extends Controller
{
    // public function __construct() {
    //     Configuration::setXenditKey(config('app.xendit_api_key'));
    // }

    public function register(Request $request, Activity $activity)
    {
        // Check if user is already registered for the activity today
        $existingRegistration = Registration::where('user_id', Auth::id())
            ->where('activity_id', $activity->id)
            ->whereDate('created_at', now()->toDateString())
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'Kamu sudah mendaftar event ini, silahkan daftar lagi besok!.');
        }

        // Register the user
        Registration::create([
            'user_id' => Auth::id(),
            'activity_id' => $activity->id,
        ]);

        return redirect()->route('user.page.battle.battle', $activity->id)->with('success', 'Selamat bermain.');
    }

    public function unregister(Activity $activity)
    {
        // Find the registration
        $registration = Registration::where('user_id', Auth::id())
            ->where('activity_id', $activity->id)
            ->first();

        if (!$registration) {
            return redirect()->back()->with('error', 'You are not registered for this activity.');
        }

        // Delete the registration
        $registration->delete();

        return redirect()->back()->with('success', 'You have been successfully unregistered from this activity.');
    }

    // public function showPaymentForm(Activity $activity)
    // {
    //     return view('user.payment', compact('activity'));
    // }

    // public function __construct()
    // {
    //     Configuration::setXenditKey(env('XENDIT_API_KEY'));
    // }

    // public function processPayment(Request $request, Activity $activity)
    // {
    //     $request->validate([
    //         'form_text' => 'required|string',
    //         'form_image' => 'required|image|max:5000',
    //     ]);

    //     $from_image_path = $request->file('form_image')->store('form_images', 'public');
    //     $external_id = 'Inv-' . rand();

    //     $apiInstance = new InvoiceApi();

    //     $invoice = new CreateInvoiceRequest([
    //         'external_id' => $external_id,
    //         'amount' => $activity->price,
    //         'invoice_duration' => 172800,
    //         'customer_email' => Auth::user()->email,
    //     ]);

    //     $generateInvoice = $apiInstance->createInvoice($invoice);

    //     $invoiceUrl = $generateInvoice->getInvoiceUrl();

    //     BattleTransaksi::create([
    //         'user_id' => Auth::id(),
    //         'activity_id' => $activity->id,
    //         'amount' => $activity->price,
    //         'external_id' => $external_id,
    //         'form_text' => $request->input('form_text'),
    //         'form_image' => $from_image_path,
    //         'status' => 'UNPAID', 
    //         'invoice_url' => $invoiceUrl,
    //     ]);
    
    //     return redirect()->route('user.dashboard')->with('success', 'Transaction created. Please proceed to payment.');

    // }

    // public function paymentCallback(Request $request)
    // {
    //     $getToken = $request->headers->get('x-callback-token');
    //     $callbackToken = env('XENDIT_CALLBACK_TOKEN');

    //     if (!$callbackToken) {
    //         return response()->json(
    //             [
    //                 'status' => 'error',
    //                 'message' => 'callback token not exist',
    //             ],
    //             404,
    //         );
    //     }

    //     $externalId = $request->external_id;
    //     $status = $request->status;

    //     $battleTransaksi = BattleTransaksi::where('external_id', $externalId)->first();
    //     if ($battleTransaksi) {
    //         if ($status === 'PAID') {
    //             $battleTransaksi->update([
    //                 'status' => 'PAID',
    //                 'payment_date' => now(),
    //             ]);

    //             $activity = Activity::find($battleTransaksi->activity_id);

    //             if ($activity && $activity->slot > 0) {
    //                 $activity->decrement('slot');
    //             }

    //             return response()->json(['status' => 'success', 'message' => 'Battle transaction updated successfully']);
    //         }
    //     }

    //     $transaksiLapangan = TransaksiLapangan::where('external_id', $externalId)->first();
    //     if ($transaksiLapangan) {
    //         $transaksiLapangan->update([
    //             'status' => $status,
    //         ]);
    //         return response()->json(['status' => 'success', 'message' => 'Field transaction updated successfully']);
    //     }

    //     return response()->json(['status' => 'error', 'message' => 'Transaction not found'], 404);
    // }

    
}