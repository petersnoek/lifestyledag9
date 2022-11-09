<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ActivityRound;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Eventround;

class EventController extends Controller
{
    public function index(Request $request) {
        return view('dashboard', ['events' => Event::all()]);
    }

    public function show(Request $request) {
        
    }
}
