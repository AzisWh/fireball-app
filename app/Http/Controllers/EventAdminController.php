<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::with('activities')->get();
        return view('admin.event.index', compact('events'));
    }
    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
    
        Alert::success('Success', 'Event created successfully.');
        return redirect()->route('events.index', compact('event'));
    }

    public function show(Event $event)
    {
        return view('admin.event.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if($request->hasFile('image')) {
            //Hapus gambar lama jika ada
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            $originalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('BattleImage', $originalName, 'public');
            $validated['image'] = $path;
        }
    
        $event->update($validated);

        Alert::success('Success', 'Event updated successfully.');
        return redirect()->route('events.index');
    }


    public function destroy(Event $event)
    {
        if ($event->image && Storage::disk('public')->exists($event->image)) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        Alert::success('Success', 'Event deleted successfully.');
        return redirect()->route('events.index');
    }

    public function registeredUsers()
    {
        // Fetch all registrations with related user, activity, and event data
        $registrations = Registration::with('user', 'activity.event')->get();

        // Pass the registrations to the view
        return view('admin.event.registered_users', compact('registrations'));
    }

    public function destroyRegistration($id)
    {
        // Find the registration by ID
        $registration = Registration::find($id);

        if (!$registration) {
            return redirect()->route('events.registeredUsers')->with('error', 'Registration not found.');
        }

        // Delete the registration
        $registration->delete();

        return redirect()->route('events.registeredUsers')->with('success', 'Registration deleted successfully.');
    }
}
