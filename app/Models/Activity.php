<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function enlistments() {
        return $this->hasMany(enlistment::class);
    }
}
