<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

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
        $event = Event::create($request->all());
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

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }


    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index');
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
