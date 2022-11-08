<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityRound;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Eventround;

class EventController extends Controller
{
    public function index(Request $request) {
        return view('dashboard', ['events' => Event::all()]);
    }

    public function show(Request $request, $id) {
        $event = Event::find($id);
        $eventRounds = Eventround::where('event_id', $event->id)->get();
        $activityRounds = [];
        foreach($eventRounds as $eventRound){
            array_push($activityRounds, ActivityRound::where('eventround_id', $eventRound->id)->get());
        }
        //dd($event->enlitments);
/*         $act = Activity::find('2'); */
        /* dd($act->owner()->name); */
        $activity_enlistments = Activity::where('event_id', $id)->get();
        //dd($activity_enlistments);
        return view('events.show', [
            'event' => $event,
            'activities' => $event->activities,
            'activityRound' => $activityRounds,
        ]);
    }
}
