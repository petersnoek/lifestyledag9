<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRound;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use App\Rules\NamePattern;
use App\Rules\LocationPattern;
use App\Rules\DescriptionPattern;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(Request $request) {
        return view('dashboard', ['events' => Event::all()]);
    }

    public function create() {
        return response()->view('events.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', new NamePattern()],
            'description' => [new DescriptionPattern()],
            'location' => ['required', 'max:80', new LocationPattern()],

            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after:startDate'],

            'startEnlistment' => ['required', 'date', 'before:startDate'],
            'endEnlistment' => ['required', 'date', 'after:startEnlistment', 'before:startDate'],

            'image' => ['image','mimes:jpeg,png,jpg'], /* needs file type validation */
        ]);

        if ($validator->fails()) {
            return redirect()->route('event.create')->withinput($request->all())->with('errors', $validator->errors());
        }

        /* stores image in public/EventHeaders folder */
        if(isset($request->image)) {
            $request->image->store('eventHeaders', 'public');
        }
        
        /*create new event object and insert data into corresponding attribute*/
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;

        $event->starts_at = $request->startDate;
        $event->ends_at = $request->endDate;
        
        $event->enlist_starts_at = $request->startEnlistment;
        $event->enlist_stops_at = $request->endEnlistment;

        if(isset($request->image)) {
            $event->image = $request->image->hashName();
        }

        $event->save();

        return redirect()->route('dashboard');
    }

    public function round($event_id){
        $event_id = ['event_id' => Crypt::decrypt($event_id)];
        $validator = Validator::make($event_id, [
            'event_id' => ['required', Rule::exists(Event::class, 'id')]
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard')->withinput($event_id['event_id'])->with('errors', $validator->errors());
        }

        $event_id = $event_id['event_id'];
        $event = Event::find($event_id);

        return response()->view('events.round', [
            'event' => $event
        ]);
    }

    public function storeRound(Request $request) {
        $validator = Validator::make($request->all(), [
            'startRound1' => ['required', 'date'],
            'endRound1' => ['required', 'date', 'after:startRound1'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('event.round')->withinput($request->all())->with('errors', $validator->errors());
        }
        
        /*create new eventround object and insert data into corresponding attribute*/
        $round = new EventRound();

        $round->starts_at = $request->startRound1;
        $round->ends_at = $request->endRound1;

        $round->save();

        return redirect()->route('activity.index');
    }
}
