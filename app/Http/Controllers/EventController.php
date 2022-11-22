<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index() {

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

        if (!$event->can_vieuw()) {
            return redirect()->route('dashboard');
        }

        return response()->view('events.show', [
            'event' => $event
        ]);
    }
}
