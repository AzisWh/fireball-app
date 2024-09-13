<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;

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
    
        $activity->update($request->all());
    
        return redirect()->route('events.show', $event);
    }

    public function destroy(Event $event, Activity $activity)
    {
        $activity->delete();
        return redirect()->route('events.show', $event);
    }
}
