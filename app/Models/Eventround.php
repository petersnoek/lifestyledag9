<?php

namespace App\Models;

use App\Models\Enlistment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRound extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function enlistments()
    {
        return $this->hasMany(Enlistment::class, 'round_id');
    }

    public function enlistment()
    {
        return $this->belongsTo(Enlistment::class);
    }
}
