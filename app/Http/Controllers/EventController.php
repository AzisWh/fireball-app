<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('activities.registrations')->get();
        return view('user.page.event.event', compact('events'));
    }
    
}
