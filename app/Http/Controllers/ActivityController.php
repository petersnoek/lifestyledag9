<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Activity;
use App\Models\Eventround;
use App\Rules\NamePattern;
use Illuminate\Http\Request;
use App\Models\ActivityRound;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Rules\DescriptionPattern;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* send to create activity forum view, might not need the Evenround:all() instead $event->eventrounds */
        $events = Event::with('eventrounds')->where('ends_at', '>=', Carbon::now()->toDateTimeString())->get(['id','name']);

        return response()->view('activities.create', [
            'events' => $events
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->max_participants[$request->event_id]);
        // $test = 'max_participants.3.1';
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', new NamePattern()],
            'description' => [new DescriptionPattern()],
            'event_id' => ['required', Rule::exists(Event::class, 'id')], /* this error gives 'The event id field is required.' which might not be a good error message */
            'image' => ['image','mimes:jpeg,png,jpg'],
            'max_participants.*' => ['required','numeric', 'min:0', 'max:1000']
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id')) {
                $id = intval($request->id);
                return redirect()->route('dashboard')->with('errors', ['Error met data contact persoon.']);
            }
            return redirect()->route('activity.create')->withinput($request->all())->with('errors', $validator->errors()->getmessages());
        }

        $event_id = $request->event_id;
        $event = Event::find($event_id);
        /*create new activity object and insert data into corresponding attribute*/
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        if(isset($request->image)){
            /* stores image in public/ActivityHeaders folder */
            $request->image->store('activityHeaders', 'public');
            $activity->image = $request->image->hashName();
        }
        $activity->event_id = $event_id;
        $activity->owner_user_id = Auth::user()->id;
        $activity->save();

        /* create and store corresponding activity rounds */
        foreach($event->eventrounds()->get() as $eventround){
            $activityRound = new ActivityRound();
            $activityRound->activity_id = $activity->id;
            $activityRound->eventround_id = $eventround->id;
            $activityRound->max_participants = $request->max_participants[$eventround->round];
            $activityRound->save();
        }

        return redirect()->route('dashboard')->withSuccess(__('Uw activiteit "' . $activity->name . '" is aangemaakt.'));
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
    public function edit($activity_id)
    {
        $activity_id = ['activity_id' => Crypt::decrypt($activity_id)];
        $validator = Validator::make($activity_id, [
            'activity_id' => ['required', 'numeric', Rule::exists(Activity::class, 'id')]
        ]);
        $activity_id = intval($activity_id['activity_id']);

        if ($validator->fails()) {
            return redirect()->route('dashboard')->with('errors', ['Error met activiteiten data.']);
        }

        $activity = Activity::find($activity_id);
        $events = Event::with('eventrounds')->where('ends_at', '>=', Carbon::now()->toDateTimeString())->get(['id','name']);
        $oldKeys = [];
        $oldValues = [];

        return response()->view('activities.edit', [
            'activity' => $activity,
            'events' => $events,
            'oldKeys' => $oldKeys,
            'oldValues' => $oldValues,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_id' => ['required', 'min:0', Rule::exists(Activity::class, 'id')],
            'name' => ['required', 'max:255', new NamePattern()],
            'description' => [new DescriptionPattern()],
            'event_id' => ['required', 'min:0', Rule::exists(Event::class, 'id')],
            'image' => ['image','mimes:jpeg,png,jpg'],
            'max_participants' => ['required', 'array', 'min:1'],
            'max_participants.*' => ['required','integer', 'min:0', 'max:1000']
        ], [
            'event_id.exists' => 'De event bestaat niet.',
            'event_id.required' => 'Er moet een event gekozen zijn.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('id')) {
                $id = intval($request->id);
                return redirect()->route('dashboard')->with('errors', ['Error met data contact persoon.']);
            }
            return redirect()->route('activity.edit', ['activity_id' => Crypt::encrypt($request->activity_id)])->withinput($request->all())->with('errors', $validator->errors());
        }


        $event_id = $request->event_id;
        $event = Event::find($event_id);

        $activity = Activity::find($request->activity_id);
        $activity->name = $request->name;
        $activity->description = $request->description;
        if(isset($request->image)){
            /* stores image in public/ActivityHeaders folder */
            $request->image->store('activityHeaders', 'public');
            $activity->image = $request->image->hashName();
        }
        $activity->event_id = $event_id;
        $activity->delete_rounds();
        $activity->save();

        /* create and store corresponding activity rounds */
        foreach($event->eventrounds()->get() as $eventround){
            $activityRound = new ActivityRound();
            $activityRound->activity_id = $activity->id;
            $activityRound->eventround_id = $eventround->id;
            $activityRound->max_participants = $request->max_participants[$eventround->round];
            $activityRound->save();
        }

        return redirect()->route('dashboard')->withSuccess(__('Uw activiteit "' . $activity->name . '" is aangepast.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
