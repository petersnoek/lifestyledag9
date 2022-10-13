<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityRound extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'eventround_id',
        'max_participants',
    ];
}
