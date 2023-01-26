<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Enlistment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eventround extends Model
{
    use HasFactory;

    public function startAndEndTime()
    {
        $format = 'H:i';
        $start_time = Carbon::parse($this->start_time)->format($format);
        $end_time = Carbon::parse($this->end_time)->format($format);

        return $start_time . ' - ' . $end_time;
    }

    public function startTimeText()
    {
        $format = 'H:i';
        $start_time = Carbon::parse($this->start_time)->format($format);

        return $start_time;
    }

    public function endTimeText()
    {
        $format = 'H:i';
        $end_time = Carbon::parse($this->end_time)->format($format);

        return $end_time;
    }

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
