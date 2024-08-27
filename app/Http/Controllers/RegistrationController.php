<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
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

        return redirect()->back()->with('success', 'Berhasil terdaftar, selamat bertanding');
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
}
