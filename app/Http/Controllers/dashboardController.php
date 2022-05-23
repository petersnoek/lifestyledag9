<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Event;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index() {
        dd();
        return view('dashboard', [
            'activities' => Activity::all(),
            'enlistments' => Activity::all()->enlistments->get()
        ]);
    }
}
