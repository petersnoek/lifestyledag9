<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Event;
use App\Models\User;
use App\Models\Eventround;

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
        // Eventround::where("event_id", 1)->get();
        /* $eventrounds = Event::find(1)->eventrounds() */
        return view('activities.createActiviteit', ['events' => Event::all(), 'rounds' => Eventround::all()]);
    }

      // gegevens van aanmeldingsformulier in sessie stoppen
    public function getData(Request $request) {
        $naam = $request->input('naam');
        $beschrijving = $request->input('beschrijving');
        $event_id = $request->input('event');
        $capaciteit = $request->input('capaciteit');
        $user_id = $request->input('user_id');
        /* $user = User::where('id', $user_id);
        dd($user->name); */
        /* Session::put($activiteit, $beschrijving, $ronde, $capaciteit);
        Session::save(); */
        // $data = array('name'=>$naam, 'description'=>$beschrijving, 'event_id'=>$event_id);
        Activity::create(['name'=>$naam,'owner_user_id'=>$user_id, 'description'=>$beschrijving, 'event_id'=>$event_id]);
        //maak de kopel table input
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
