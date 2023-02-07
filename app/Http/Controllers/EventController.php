<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRound;
use App\Rules\TitlePattern;
use App\Rules\LocationPattern;
use App\Rules\DescriptionPattern;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function create() {
        return response()->view('events.create');
    }

    // Functie om de data van het evenement aanmaken op te slaan in de db
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', new TitlePattern()],
            'description' => ['max:255', new DescriptionPattern()],
            'location' => ['required', 'max:255', new LocationPattern()],

            'eventDate' => ['required', 'date'],
            'eventStartTime' => ['required','date_format:H:i'],
            'eventEndTime' => ['required', 'date_format:H:i', 'after:eventStartTime'],

            'startEnlistment' => ['required', 'date', 'before:eventDate'],
            'endEnlistment' => ['required', 'date', 'after:startEnlistment', 'before:eventDate'],

            'round' => ['array', 'min:1'],
            'round.*' => ['numeric'],

            'startRound' => ['array','min:1',
                function ($attribute,$value, $fail){
                    //check if atleast one startRound isn't empty
                    $emptyCount = 0;
                    foreach($value as $startRound){
                        if ($startRound === null) {
                            $emptyCount++;
                        }
                    }
                    if($emptyCount == count($value)){
                        $fail('Vul tenminste één \'ronde start-tijd\' in');
                    }},
            ],
            'startRound.*' => ['after_or_equal:eventStartTime', 'before_or_equal:eventEndTime', 'required_with:endRound.*', 'nullable'],
            'endRound' => ['array','min:1',
                function ($attribute,$value, $fail) {
                    //check if atleast one endRound isn't empty
                    $emptyCount = 0;
                    foreach($value as $endRound){
                        if ($endRound === null) {
                            $emptyCount++;
                        }
                    }
                    if($emptyCount == count($value)){
                        $fail('Vul tenminste één \'ronde eind-tijd\' in');
                    }},
            ], 
            'endRound.*' => ['after:startRound.*', 'before_or_equal:eventEndTime', 'required_with:startRound.*', 'nullable'],
            
            'image' => ['image','mimes:jpeg,png,jpg'],
        ]);
        
        if ($validator->fails()) {
            return redirect()->route('event.create')->withinput($request->all())->with('errors', $validator->errors()->getMessages());
        }

        /* stores image in public/eventHeaders folder */
        if(isset($request->image)) {
            $request->image->store('eventHeaders', 'public');
        }
        
        /* create new event object and insert data into corresponding attribute */
        $event = new Event();
        
        $event->name = $request->name;
        $event->description = $request->description;
        $event->location = $request->location;

        $event->date = $request->eventDate;

        $event->starts_at = $request->eventStartTime;
        $event->ends_at = $request->eventEndTime;
        
        $event->enlist_starts_at = $request->startEnlistment;
        $event->enlist_stops_at = $request->endEnlistment;

        if(isset($request->image)) {
            $event->image = $request->image->hashName();
        }

        $event->save();

        /* loop through rounds and get the data for each round */
        foreach ($request->round as $key) {
            if($request->startRound[$key] != null && $request->endRound[$key] != null){
                $eventRound = new EventRound();

                $eventRound->event_id = $event->id;
                $eventRound->round = $key;
    
                $eventRound->start_time = $request->startRound[$key];
                $eventRound->end_time = $request->endRound[$key];
            }
            $eventRound->save();
        }
        return redirect()->route('dashboard');
    }

    public function show($event_id) {
        $event_id = ['event_id' => Crypt::decrypt($event_id)];
        $validator = Validator::make($event_id, [
            'event_id' => ['required', Rule::exists(Event::class, 'id')]
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard')->withinput($event_id['event_id'])->with('errors', $validator->errors());
        }

        $event_id = $event_id['event_id'];
        $event = Event::find($event_id);

        if (!$event->can_view()) {
            return redirect()->route('dashboard')->withErrors(__('U heeft niet de juist bevoegdheden om deze pagina te zien.'));
        }
        return response()->view('events.show', [
            'event' => $event
        ]);
    }
}
