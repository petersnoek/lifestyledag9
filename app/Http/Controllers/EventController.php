<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRound;
use App\Rules\NamePattern;
use App\Rules\TitlePattern;
use App\Rules\LocationPattern;
use Illuminate\Validation\Rule;
use App\Rules\DescriptionPattern;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function create() {
        return response()->view('events.create');
    }

    public function edit(Request $request, $event_id) {
        $event_id = ['event_id' => Crypt::decrypt($event_id)];
        $validator = Validator::make($event_id, [
            'id' => ['required', Rule::exists(Event::class, 'id')]
        ]);

        $event_id = $event_id['event_id'];

        if ($validator->fails()) {
            return redirect()->route('dashboard')->withinput($request->all())->with('errors', $validator->errors());
        }

        $event = Event::find($event_id);

        return response()->view('events.edit', [
            'event' => $event
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['bail', 'required', 'integer', 'min:1', Rule::exists(Event::class, 'id')],
            'name' => ['required', new TitlePattern(), 'max:255'],
            'description' => [new DescriptionPattern(), 'max:255'],
            'location' => ['required', new LocationPattern(), 'max:255'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('dashboard', ['id' => Crypt::encrypt($request->id)])->withinput($request->all())->with('errors', $validator->errors());
        }

        $event = Event::find($request->id);
        $event->name = $request->NamePattern;
        $event->description = $request->description;
        $event->location = $request->location;
        $event->save();

        return redirect()->route('dashboard')->withSuccess(__('succes.events.update'));
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

            'startRound' => ['array', 'min:1',
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
            'startRound.*' => [/* removed nullable and added it to closure rule functions cuz otherwise it ignorse them (most importantly the last one)  */
                function ($attribute,$value, $fail){
                    //check if startRound.* isn't before startDate
                    if($value < date_format(date_create(request('startDate')),"H:i:s") && $value != null){
                        $fail($attribute .' can\'t be before '. date_format(date_create(request('startDate')),"H:i"));
                    }},
                function ($attribute,$value, $fail){
                    //check if startRound.* isn't after endDate
                    if($value > date_format(date_create(request('endDate')),"H:i:s") && $value != null){
                        $fail($attribute .' can\'t be after '. date_format(date_create(request('endDate')),"H:i"));
                    }},
                    
                function ($attribute,$value, $fail){
                    //check if there's a filled in endRound with the same .* and if this startRound.* is null it needs to be filled in
                        if($value === null && request('endRound.'. explode('.',$attribute)[1]) != null){
                        $fail('Bijbehorende startRound.'.explode('.',$attribute)[1].' is verijst.');
                    }},
                ],
            
            'endRound' => ['array', 'min:1',
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
            'endRound.*' => [/* this might not quite work cuz of the after:startRound but I'm running out of time */
                function ($attribute,$value, $fail){
                //check if endRound.* isn't before startRound
                if($value < request('startRound.'. explode('.',$attribute)[1]) && $value != null){
                    $fail($attribute .' can\'t be before '. date_format(date_create(request('endDate')),"H:i"));
                }},
                function ($attribute,$value, $fail){
                    //check if endRound.* isn't after endDate
                    if($value > date_format(date_create(request('endDate')),"H:i:s") && $value != null){
                        $fail($attribute .' can\'t be after '. date_format(date_create(request('endDate')),"H:i"));
                    }},
                function ($attribute,$value, $fail){
                    //check if there's a filled in startRound with the same .* and if this endRound.* is null it needs to be filled in
                    if($value === null && request('startRound.'. explode('.',$attribute)[1]) != null){
                        $fail('Bijbehorende endRound.'.explode('.',$attribute)[1].' is verijst.');
                    }}
            ],
            
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
        foreach ($request->round as $key) {
            if($request->startRound[$key] != null && $request->endRound[$key] != null){
                $eventRound = new EventRound();

                $eventRound->event_id = $events->id;
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
