<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    
        if($request->hasFile('image')) {
            $originalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('BattleImage', $originalName, 'public');
            $validated['image'] = $path;
        }
    
        $event = Event::create($validated);
    
        return redirect()->route('events.index', compact('event'))->with('success', 'Event created successfully.');
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
            'price' => 'required|integer',
            'slot' => 'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        if($request->hasFile('image')) {
            //Hapus gambar lama jika ada
            if ($event->image && Storage::disk('public')->exists($event->image)) {
                Storage::disk('public')->delete($event->image);
            }

            $originalName = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('PaketJasa', $originalName, 'public');
            $validated['image'] = $path;
        }
    
        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }


    public function destroy(Event $event)
    {
        $event->delete();
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
