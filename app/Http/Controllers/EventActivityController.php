<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EventActivityController extends Controller
{
    public function create(Event $event)
    {
        return view('admin.activities.create', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'nullable|numeric',
            'slot' => 'required|integer', 
        ]);
    
        $event->activities()->create($request->all());
        
        Alert::success('Success', 'Activity created successfully.');
        return redirect()->route('events.show', $event);
    }

    public function edit(Event $event, Activity $activity)
    {
        return view('admin.activities.edit', compact('event', 'activity'));
    }

    public function update(Request $request, Event $event, Activity $activity)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'nullable|numeric',
            'slot' => 'required|integer', 
        ]);
    
        Alert::success('Success', 'Activity updated successfully.');
        return redirect()->route('events.show', $event);
    }

    public function destroy(Event $event, Activity $activity)
    {
        $activity->delete();

        Alert::success('Success', 'Activity deleted successfully.');
        return redirect()->route('events.show', $event);
    }
}
