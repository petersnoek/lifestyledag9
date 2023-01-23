<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRound;
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

    // Functie om de data van het evenement aanmaken op te slaan in de db
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', new NamePattern()],
            'description' => ['max:255',new DescriptionPattern()],
            'location' => ['required', 'max:255', new LocationPattern()],

            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after:startDate'],

            'startEnlistment' => ['required', 'date', 'before:startDate'],
            'endEnlistment' => ['required', 'date', 'after:startEnlistment', 'before:startDate'],

            'round' => ['array', 'min:1'],
            'round.*' => ['numeric'],

            'startRound' => ['array', 'min:1'],
            'startRound.*' => ['nullable','after:startDate', 'before:endDate'],
            
            'endRound' => ['array', 'min:1'],
            'endRound.*' => ['nullable','after:startRound.*', 'before:endDate'],
            
            'image' => ['image','mimes:jpeg,png,jpg'], /* needs file type validation */
        ]);

        if ($validator->fails()) {
            return redirect()->route('event.create')->withinput($request->all())->with('errors', $validator->errors()->getMessages());
        }

        /* stores image in public/eventHeaders folder */
        if(isset($request->image)) {
            $request->image->store('eventHeaders', 'public');
        }
        
        /* create new event object and insert data into corresponding attribute */
        $events = new Event();
        
        $events->name = $request->name;
        $events->description = $request->description;
        $events->location = $request->location;

        $events->starts_at = $request->startDate;
        $events->ends_at = $request->endDate;
        
        $events->enlist_starts_at = $request->startEnlistment;
        $events->enlist_stops_at = $request->endEnlistment;

        if(isset($request->image)) {
            $events->image = $request->image->hashName();
        }

        $events->save();

        /* loop through rounds and get the data for each round */
        foreach ($request->round as $key => $value) {
            $eventRound = new EventRound();

            $eventRound->event_id = $events->id;
            $eventRound->round = $value;

            $eventRound->start_time = $request->startRound[$key];
            $eventRound->end_time = $request->endRound[$key];

            /* if start_time and end_time are null, remove row from database */
            if($eventRound->start_time == null && $eventRound->end_time == null){
                $eventRound->where('event_id',  $eventRound->event_id)->whereNull('start_time')->whereNull('end_time')->delete();
            }

            // if($eventRound->round == 5){
                // dd($eventRound->start_time);
            // }
            
            $eventRound->save();
        }
        return redirect()->route('dashboard');
    }
}
