<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function displayName() {
        return $this->name;
    }

    public function eventrounds()
    {
        return $this->hasMany('App\Models\Eventround', 'event_id', 'id')->orderBy('round');
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

}
