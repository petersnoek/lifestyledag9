<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Activity;
use App\Models\Eventround;
use App\Rules\NamePattern;
use Illuminate\Http\Request;
use App\Models\ActivityRound;
use Illuminate\Support\Facades\Crypt;
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
    public function index($event_id)
    {
        $event_id = ['event_id' => Crypt::decrypt($event_id)];
        $validator = Validator::make($event_id, [
            'event_id' => ['required', Rule::exists(Event::class, 'id')]
        ]);

        if ($validator->fails()) {
            return redirect()->route('dashboard')->withinput($event_id['event_id'])->with('errors', $validator->errors());
        }

        $event_id = $event_id['event_id'];
        $event = Event::find($event_id);

        return response()->view('activities.index', [
            'event' => $event
        ]);
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
            'events' => Event::with('eventrounds')->where('ends_at', '>=', Carbon::now()->toDateTimeString())->get(['id','name',]),
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

        return redirect()->route('dashboard')->withSuccess(__('Uw activiteit "' . $activity->name . '" is aangemaakt.'));;
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
    public function edit(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'activity_id' => ['required', 'numeric', Rule::exists(Activity::class, 'id')]
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->route('dashboard')->with('errors', ['Error met activiteiten data.']);
        // }

        // $activity_id = intval($request->activity_id);
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
