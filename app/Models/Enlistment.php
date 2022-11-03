<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Enlistment extends Model
{
    use HasFactory;

    public function activity() {
        return $this->belongsTo(Activity::class);
    }

    public function eventrounds()
    {
        return $this->hasOne(Eventround::class, 'id', 'round_id');
    }

    public function is_owner()
    {
        if ($this->user_id == Auth::user()->id) {
            return true;
        }

        return false;
    }
}
