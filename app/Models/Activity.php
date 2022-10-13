<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\User;
use App\Models\Enlistment;

class Activity extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function enlistments() {
        return $this->hasMany(Enlistment::class);
    }

    function max_participants() {
        return $this->hasMany(ActivityRound::class);
    }

    function max_participants_round($eventround_id) {
        return $this->hasMany(ActivityRound::class)->where('eventround_id', $eventround_id);
    }

    function availability_message($eventround_id, $max_count) {
        $enlistment_count = $this->enlistments()
            ->where('round_id', $eventround_id)->count();

        if ($enlistment_count >= $max_count) {
            return 'vol';
        } else {
            return ($max_count - $enlistment_count) . ' plekken beschikbaar';
        }
    }
}
