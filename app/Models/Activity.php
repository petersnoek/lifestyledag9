<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Enlistment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activity extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'owner_user_id'); //,'owner_user_id'
    }

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function enlistments() {
        return $this->hasMany(Enlistment::class);
    }

    public function rounds() {
        return $this->hasMany(ActivityRound::class);
    }

    function max_participants() {
        return $this->hasMany(ActivityRound::class);
    }

    function max_participants_round($eventround_id) {
        return $this->hasMany(ActivityRound::class)->where('eventround_id', $eventround_id);
    }

    public function is_owner()
    {
        if ($this->user()->first()->id == User::find(Auth::user()->id)->id) {
            return true;
        }
        return false;
    }

    function availability($eventround_id) {
        $enlistment_count = $this->enlistments()->where('round_id', $eventround_id)->count();
        $round = $this->rounds()->where('eventround_id', $eventround_id)->first();

        if($round == null) {
            $max_participants = 0;
        } else {
            $max_participants = $round->max_participants;
        }

        if ($max_participants <= 0) {
            return false;
        } else if ($enlistment_count >= $max_participants) {
            return false;
        } else {
            return true;
        }
    }

    function availability_message($eventround_id) {
        $enlistment_count = $this->enlistments()->where('round_id', $eventround_id)->count();
        $round = $this->rounds()->where('eventround_id', $eventround_id)->first();
        if($round == null) {
            $max_participants = 0;
        } else {
            $max_participants = $round->max_participants;
        }

        if ($max_participants <= 0) {
            return 'geen plaatsen beschikbaar';
        } else if ($enlistment_count >= $max_participants) {
            return 'vol';
        } else {
            return ($max_participants - $enlistment_count) . ' plekken beschikbaar';
        }
    }
}