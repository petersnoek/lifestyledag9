<?php

namespace App\Http\Controllers;

use App\Models\Enlistment;
use App\Models\Activity;
use App\Models\EventRound;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EnlistmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => ['required', 'numeric', Rule::exists(Event::class, 'id')],
            'activity_id' => ['required', 'numeric', Rule::exists(Activity::class, 'id')],
            'round_id' => ['required', 'numeric', Rule::exists(EventRound::class, 'id')]
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard')->with('errors', ['Error met data inschrijving.']);
        }

        $event_id = intval($request->event_id);
        $activity_id = intval($request->activity_id);
        $round_id = intval($request->round_id);

        $activity = Activity::find($activity_id);

        $activity_availability = $activity->availability($round_id);
        $enlistment_for_round_exists = $activity->enlistment_for_round_exists($round_id);
        $enlistment_for_activity_exists = $activity->enlistment_for_activity_exists();
        $registrations_possible = Event::find($event_id)->registrations_possible(); 

        // checkt of het mogelijk is om in te schrijven.
        if ($activity_availability && !$enlistment_for_round_exists && !$enlistment_for_activity_exists && $registrations_possible) {
            $enlistment = new Enlistment();
            $enlistment->event_id = $event_id;
            $enlistment->activity_id = $activity_id;
            $enlistment->round_id = $round_id;
            $enlistment->user_id = Auth::user()->id;
            $enlistment->save();

            return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)]);
        } else if (!$registrations_possible) {
            return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)])->with('errors', ['Registraties voor dit event zijn nog niet begonnen of al geëindigd.']);
        } else if ($enlistment_for_activity_exists) {
            return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)])->with('errors', ['U bent al ingeschreven voor deze activiteit.']);
        } else if ($enlistment_for_round_exists) {
            return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)])->with('errors', ['U bent al ingeschreven voor een activiteit in deze ronde.']);
        }

        return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)])->with('errors', ['Niet mogelijk om voor deze activiteiten ronde in te schrijven.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'enlistment_id' => ['required', 'numeric', Rule::exists(Enlistment::class, 'id')],
            'event_id' => ['required', 'numeric', Rule::exists(Event::class, 'id')]
        ], [
            'enlistment_id.exists' => 'De inschrijving bestaat niet of is al verwijderd.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('enlistment_id') && !$errors->has('event_id')) {
                $event_id = intval($request->event_id);

                //als enlistment niet bestaat geen error message, omdat het verwarrend is.
                //De validation fails exist vaak wanneer je meerdere keren de functie aanroept op dezelfde enlistment
                if (in_array('Exists', array_keys($validator->failed()["enlistment_id"]))) {
                    return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)]);
                }
                return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)])->with('errors', $errors->get('enlistment_id'));
            }
            return redirect()->route('dashboard')->with('errors', ['Error met data inschrijving.']);
        }

        $event_id = intval($request->event_id);
        $enlistment_id = intval($request->enlistment_id);
        $enlistment = Enlistment::find($enlistment_id);

        if ($enlistment->is_owner()) {
            $enlistment->delete();
            return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)]);
        }
        return redirect()->route('event.show', ['event_id' => Crypt::encrypt($event_id)])->with('errors', ['Jij bent niet toegestaan om deze inschrijving te verwijderen.']);
    }
}
