<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Event extends Model
{
    use HasFactory;

    public function displayName() {
        return $this->name;
    }

    public function eventrounds()
    {
        return $this->hasMany(Eventround::class, 'event_id', 'id')->orderBy('round');
    }

    public function has_round($round) {
        return $this->hasMany(Eventround::class, 'event_id', 'id')->where('round', $round)->count() > 0;
    }

    public function has_rounds()
    {
        return $this->hasMany(Eventround::class, 'event_id', 'id')->count() > 0;
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function enlistments() {
        return $this->hasMany(Enlistment::class);
    }

    //checkt of registreren voor event is begonnen en nog niet is afgelopen.
    public function registrations_possible() {
        $enlist_starts_at = Carbon::parse($this->enlist_starts_at);
        $enlist_stops_at = Carbon::parse($this->enlist_stops_at);

        return Carbon::now()->between($enlist_starts_at, $enlist_stops_at);
    }

    //checkt of registreren al is begonnen of geweest.
    public function after_event_registration() {
        $enlist_starts_at = Carbon::parse($this->enlist_starts_at);

        return $enlist_starts_at->isPast();
    }

    //return if this event can be vieuw by logedin user.
    public function can_vieuw() {
        $User = User::find(Auth::User()->id);
        if ($User->can('view-any-event')) {
            return true;
        }

        return ($this->frontpage == true);
    }
}
