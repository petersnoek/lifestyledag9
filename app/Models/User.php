<?php

namespace App\Models;

use App\Models\Enlistment;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function enlistments(){
        return $this->hasMany(Enlistment::class);
    }

    public function contact()
    {
        return $this->hasOne(Contact::class, 'id', 'user_id');
    }

    public function contact_created_by()
    {
        return $this->hasMany(Contact::class, 'id', 'created_by');
    }

    public function contact_last_edited_by()
    {
        return $this->hasMany(Contact::class, 'id', 'last_edited_by');
    }

    function is_enlisted_for($activity_id) {
        $activity = Activity::findOrFail($activity_id);
        $event = Event::findOrFail($activity->event_id);

        return $event = Enlistment::where([['event_id', $event->id], ['activity_id', $activity->id], ['user_id', $this->id]])->exists();
    }

    function enlistments_for_event($event_id) {
        $event = Event::findOrFail($event_id);

        return $this->hasMany(Enlistment::class)->where('event_id', $event->id)->orderBy('round_id', 'asc')->get();
    }
}
