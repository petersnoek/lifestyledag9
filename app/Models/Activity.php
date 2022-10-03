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
 
    public function event() { 
        return $this->belongsTo(Event::class); 
    } 
 
    public function enlistments() { 
        return $this->hasMany(Enlistment::class); 
    } 
 
    public function rounds() { 
        // return 'test'; 
        return $this->hasMany(ActivityRound::class); 
    } 
 
    function max_participants() { 
        return $this->hasMany(ActivityRound::class); 
    } 
 
    function max_participants_round($eventround_id) { 
        return $this->hasMany(ActivityRound::class)->where('eventround_id', $eventround_id); 
    } 
 
    // function availability_message($eventround_id, $max_count) { 
    //     $enlistment_count = $this->enlistments() 
    //         ->where('round_id', $eventround_id)->count(); 
 
    //     if ($enlistment_count >= $max_count) { 
    //         return 'vol'; 
    //     } else { 
    //         return ($max_count - $enlistment_count) . ' plekken beschikbaar'; 
    //     } 
    // } 
 
    function availability_message($eventround_nr, $eventround_id) { 
        $enlistment_count = $this->enlistments()->where('round_id', $eventround_nr)->count(); 
        $round = $this->rounds()->where('eventround_id', $eventround_id)->first(); 
        if($round == null) { 
            $max_participants = 0; 
        } else { 
            $max_participants = $round->max_participants; 
        } 
 
        if ($max_participants <= 0) { 
            return 'geen plaatsen beschikbaar'; 
        } else if ($enlistment_count >= $max_participants) { 
            return 'vol'; 
        } else { 
            return ($max_participants - $enlistment_count) . ' plekken beschikbaar'; 
        } 
    } 
} 
