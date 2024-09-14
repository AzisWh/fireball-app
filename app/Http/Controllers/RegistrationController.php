<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\BattleTransaksi;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xendit\Configuration;
use Xendit\Xendit;


class RegistrationController extends Controller
{
    // public function __construct() {
    //     Configuration::setXenditKey(config('app.xendit_api_key'));
    // }

    public function register(Request $request, Activity $activity)
    {
        // Check if user is already registered
        $existingRegistration = Registration::where('user_id', Auth::id())
            ->where('activity_id', $activity->id)
            ->first();

        if ($existingRegistration) {
            return redirect()->back()->with('error', 'You have already registered for this activity.');
        }

        // Register the user
        Registration::create([
            'user_id' => Auth::id(),
            'activity_id' => $activity->id,
        ]);

        // Redirect to payment page
        return redirect()->route('user.page.battle.battle', $activity->id);
    }
    
    // public function showPaymentForm(Activity $activity)
    // {
    //     return view('user.payment', compact('activity'));
    // }

    // public function processPayment(Request $request, Activity $activity)
    // {
    //     // Validate the form input
    //     $request->validate([
    //         'form_text' => 'required|string',
    //         'form_image' => 'required|image|max:2048', // Max 2MB
    //     ]);

    //     // Store the uploaded image
    //     $form_image_path = $request->file('form_image')->store('form_images', 'public');

    //     // Create invoice in database
    //     $invoice = BattleTransaksi::create([
    //         'user_id' => Auth::id(),
    //         'activity_id' => $activity->id,
    //         'amount' => $activity->price,
    //         'form_text' => $request->input('form_text'),
    //         'form_image' => $form_image_path,
    //     ]);

    //     // Call Xendit API to create invoice (payment)
    //     $params = [
    //         'external_id' => 'invoice_' . $invoice->id,
    //         'amount' => $invoice->amount,
    //         'payer_email' => Auth::user()->email,
    //         'description' => 'Payment for ' . $activity->name,
    //     ];

    //     $xenditInvoice = \Xendit\Invoice::create($params);

    //     // Update invoice with external_id and payment URL
    //     $invoice->update([
    //         'external_id' => $xenditInvoice['id'],
    //     ]);

    //     // Redirect to Xendit payment page
    //     return redirect($xenditInvoice['invoice_url']);
    // }

    // public function paymentCallback(Request $request)
    // {
    //     // Handle the payment callback from Xendit
    //     $invoice = BattleTransaksi::where('external_id', $request->external_id)->first();

    //     if ($request->status === 'PAID') {
    //         $invoice->update([
    //             'status' => 'PAID',
    //             'payment_date' => now(),
    //         ]);
    //     }

    //     return response()->json(['status' => 'success']);
    // }

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
}
