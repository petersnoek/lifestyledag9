<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
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

    // Functie om de data van het evenement aanmaken op te slaan in de db
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
            // return var_dump($validator->errors());
            return redirect()->route('event.create')->withinput($request->all())->with('errors', $validator->errors());
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

        $event->starts_at = $request->startDate;
        $event->ends_at = $request->endDate;
        
        $event->enlist_starts_at = $request->startEnlistment;
        $event->enlist_stops_at = $request->endEnlistment;

        if(isset($request->image)) {
            $event->image = $request->image->hashName();
        }

        $eventData = $event;
        Session::put('eventData', $eventData);
        Session::save('eventData', $eventData);
        var_dump($eventData);

        // $event->save();

        return response()->view('events.round', [
            'event' => $event,
            'eventData' => $eventData
        ]);
    }

    // Functie om naar de event create pagina te gaan
    public function round($event_id){
        $event_id = ['event_id' => Crypt::decrypt($event_id)];
        $validator = Validator::make($event_id, [
            'event_id' => ['required', Rule::exists(Event::class, 'id')]
        ]);

        if ($validator->fails()) {
            return redirect()->route('event.create')->withinput($event_id['event_id'])->with('errors', $validator->errors());
        }

        $event_id = $event_id['event_id'];
        $event = Event::find($event_id);

        return response()->view('events.round', [
            'event' => $event
        ]);
    }

    // Functie om de data van de input velden van rondes op te slaan in de db
    public function storeRound(Request $request) {
        $validator = Validator::make($request->all(), [
            'id' => ['required', Rule::exists(Event::class, 'id')],
        ]);

        if (!$validator->fails()) {
            $event = Event::find($request->id);
        } else {
            return redirect()->route('dashboard');
        }
        
        $validator = Validator::make($request->all(), [
            'round' => ['required', 'array', 'min:1'],
            'round.*' => ['required', 'numeric'],

            'startRound' => ['required', 'array', 'min:1'],
            'startRound.*' => ['required', 'date_format:H:i'],
            
            'endRound' => ['required', 'array', 'min:1'],
            'endRound.*' => ['required', 'date_format:H:i', 'after:startRound.*'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if (!$errors->has('id')) {
                return redirect()->route('event.round', ['event_id' => Crypt::encrypt($request->id)])->withinput($request->all())->with('errors', $validator->errors());
            }
            return redirect()->route('dashboard');
        }

        $startTimeEvent = Carbon::parse($event->starts_at);

        // $eventData = $request->session()->get('eventData');
        $eventData = Session::get('eventData');
        var_dump($eventData);
        // $eventData->save();

        /*create new eventround object and insert data into corresponding attribute*/
        foreach ($request->round as $key => $value) {
            // Haal de starttijd van het event op en zet deze om in H:i format
            $date = $startTimeEvent;
            $createDate = new Carbon($date);
            $startEvent = $createDate->format('H:i');

            // Haal de starttijd van de ronde op en zet deze om in H:i format
            $date2 = $request->startRound[$key];
            $createDate2 = new Carbon($date2);
            $startRound = $createDate2->format('H:i');

            // Check of de starttijd van de ronde eerder is dan de startijd van het event, zoja geef een error
            if ($startRound < $startEvent) {
                dd($startRound . ' is eerder dan ' . $startEvent);
                // return redirect()->route('event.round', ['event_id' => Crypt::encrypt($request->id)])->withinput($request->all())->with('errors', $validator->errors());
            }
            
            $eventRound = new EventRound();

            $eventRound->event_id = $request->id;
            $eventRound->round = $value;

            $eventRound->start_time = $request->startRound[$key];
            $eventRound->end_time = $request->endRound[$key];

            $eventRound->save();
        }
        return redirect()->route('dashboard');
    }
}
