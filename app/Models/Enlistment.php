<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enlistment extends Model
{
    use HasFactory;

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function eventrounds()
    {
        return $this->hasOne(Eventround::class, 'id', 'round_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function is_owner()
    {
        if ($this->user_id == Auth::user()->id) {
            return true;
        }
        return false;
    }

    public function round()
    {
        return $this->belongsTo(Eventround::class);
    }
}
