<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {
        return view('events.index', ['events' => Event::all()]);
    }

    public function show(Request $request, $id) {
        return view('events.show', ['event' => Event::findOrFail($id)]);
    }
}
