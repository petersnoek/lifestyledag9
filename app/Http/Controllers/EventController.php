<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {
        return view('events.index', ['events' => Event::all()]);
    }

    public function show(Request $request, $id) {
        $event = Event::find($id);
        //dd($event->enlitments);
        $activity_enlistments = Activity::where('event_id', $id)->get();
        //dd($activity_enlistments);
        return view('events.show', [
            'activities' => $event->activities,
        ]);
    }
}
