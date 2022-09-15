<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityRound;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {
        return view('events.index', ['events' => Event::all()]);
    }

    public function show(Request $request, $id) {
        $event = Event::find($id);
        $event_name = $event->name;
        $activityRound = ActivityRound::where('eventround_id', $id)->get();
        //dd($event->enlitments);
        $activity_enlistments = Activity::where('event_id', $id)->get();
        //dd($activity_enlistments);
        return view('events.show', [
            'event' => $event,
            'event_name' => $event_name,
            'activities' => $event->activities,
            'activityRound' => $activityRound,
        ]);
    }
}
