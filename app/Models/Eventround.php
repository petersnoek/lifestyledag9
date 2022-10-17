<?php

namespace App\Models;

use App\Models\Enlistment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Eventround extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo('App\Event');
    }

    public function enlistment()
    {
        return $this->belongsTo(Enlistment::class);
    }
}
