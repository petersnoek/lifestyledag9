<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Activity;
use App\Models\Eventround;
use App\Rules\NamePattern;
use Illuminate\Http\Request;
use App\Models\ActivityRound;
use Illuminate\Validation\Rule;
use App\Rules\DescriptionPattern;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ActivityController extends Controller
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
        /* send to create activity forum view, might not need the Evenround:all() instead $event->eventrounds */
        return response()->view('activities.create', [
            'events' => Event::all(),
            'rounds' => Eventround::all()
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

        /*server side validate user given data with requirements and patterns(see app\rules)  */
        /*custom error messages might be needed..*/
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:255', new NamePattern()],
            'description' => [new DescriptionPattern()],
            'event_id' => ['required', Rule::exists(Event::class, 'id')], /* this error gives 'The event id field is required.' which might not be a good error message */
            'image' => [], /* needs file type validation */
            'max_participants' => ['required', 'numeric', 'min:0', 'max:1000']
        ]);

        if ($validator->fails()) {
            return redirect()->route('activity.create')->withinput($request->all())->with('errors', $validator->errors()->getMessages());
        }

        $event_id = $request->event_id;
        $event = Event::find($event_id);
        /* stores image in public/ActivityHeaders folder */
        $request->image->store('ActivityHeaders', 'public');
        /*create new activity object and insert data into corresponding attribute*/
        $activity = new Activity();
        $activity->name = $request->name;
        $activity->description = $request->description;
        $activity->image = $request->image->hashName();
        $activity->event_id = $event_id;
        $activity->owner_user_id = Auth::user()->id;
        $activity->save();

    /*create all the needed activity rounds and insert data into corresponding attribute*/
        foreach($event->eventrounds()->get() as $eventround){
            $activityRound = new ActivityRound();
            $activityRound->activity_id = $activity->id;
            $activityRound->eventround_id = $eventround->id;
            $activityRound->max_participants = $request->max_participants;
            $activityRound->save();
        }

        return redirect()->route('dashboard');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
