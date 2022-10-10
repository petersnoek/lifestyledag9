<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Event;
use App\Models\User;
use App\Models\Eventround;
use App\Models\ActivityRound;

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
        return view('activities.createActiviteit', ['events' => Event::all(), 'rounds' => Eventround::all()]);
    }
/* request all the forum data, create the activity and it's activity rounds */
    public function getData(Request $request) {
        $naam = $request->input('naam');
        $beschrijving = $request->input('beschrijving');
        $event_id = $request->input('event');
        $capaciteit = $request->input('capaciteit');
        $user_id = $request->input('user_id');

        $activity = Activity::create(['name'=>$naam,'owner_user_id'=>$user_id, 'description'=>$beschrijving, 'event_id'=>$event_id]);
        
        $event = Event::find($event_id);
        foreach($event->eventrounds as $eventround){
            ActivityRound::create(['activity_id'=>$activity->id, 'eventround_id'=>$eventround->id, 'max_participants'=>$capaciteit]);
        }

        return redirect('/dashboard');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
