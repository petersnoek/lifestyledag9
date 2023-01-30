<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Enlistment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Activity extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'owner_user_id');
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

    public function is_owner(){
        if ($this->user()->first()->id == User::find(Auth::user()->id)->id) {
            return false;
        }
        return true;
    }

    public function delete_rounds()
    {
        $this->rounds()->delete();
    }

    //checkt of enlistement met dezelfde ronde al bestaat
    function enlistment_for_round_exists($eventround_id) {
        return Enlistment::where('user_id', Auth::user()->id)->where('round_id', $eventround_id)->exists();
    }

    //checkt of enlistement met dezelfde activiteit al bestaat
    function enlistment_for_activity_exists() {
        return Enlistment::where('user_id', Auth::user()->id)->where('activity_id', $this->id)->exists();
    }

    //checkt of enlistement al bestaat
    function enlistment_exists($eventround_id) {
        return $this->enlistment_for_round_exists($eventround_id) || $this->enlistment_for_activity_exists();
    }

    // checkt of inschrijven voor deze activiteit mogelijk is.
    function availability($eventround_id) {
        $enlistment_count = $this->enlistments()->where('round_id', $eventround_id)->count();
        $round = $this->rounds()->where('eventround_id', $eventround_id)->first();
        $enlistment_exists = $this->enlistment_exists($eventround_id);

        if($round == null) {
            $max_participants = 0;
        } else {
            $max_participants = $round->max_participants;
        }

        if ($max_participants > 0 && !$enlistment_exists && $enlistment_count < $max_participants) {
            return true;
        }
        return false;
    }

    // return het bericht dat weergeven moet worden voor de mogelijkheid van het inschrijven.
    function availability_message($eventround_id) {
        $enlistment_count = $this->enlistments()->where('round_id', $eventround_id)->count();
        $round = $this->rounds()->where('eventround_id', $eventround_id)->first();
        $enlistment_for_round_exists = $this->enlistment_for_round_exists($eventround_id);
        $enlistment_for_activity_exists = $this->enlistment_for_activity_exists();

        if($round == null) {
            $max_participants = 0;
        } else {
            $max_participants = $round->max_participants;
        }

        if ($max_participants <= 0) {
            return 'geen plaatsen beschikbaar.';
        } else if ($enlistment_count >= $max_participants) {
            return 'vol';
        } else if ($enlistment_for_activity_exists) {
            return 'Je bent al ingeschreven bij deze activiteit.';
        } else if ($enlistment_for_round_exists) {
            return 'Je bent al ingeschreven in deze ronde.';
        } else {
            return ($max_participants - $enlistment_count) . ' plekken beschikbaar.';
        }
    }

    public function updatedAtDate()
    {
        $format = 'd-m-Y H:i';
        $updated_at_date = Carbon::parse($this->updated_at)->format($format);

        return $updated_at_date;
    }
}
