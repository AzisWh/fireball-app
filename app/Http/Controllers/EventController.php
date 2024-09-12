<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $currentDate = Carbon::now();

        $upcomingEvents = Event::with('activities.registrations')
                                ->where('end_date', '>=', $currentDate)
                                ->get();

        $finishedEvents = Event::with('activities.registrations')
                                ->where('end_date', '<', $currentDate)
                                ->get();

        return view('user.page.battle.battle', compact('upcomingEvents', 'finishedEvents'));
    }
    
}
