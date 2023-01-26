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
        'first_name',
        'insertion',
        'last_name',
        'class_code',
        'email',
        'password'
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

    public function displayName() {
        return $this->trimmedfirst_name() . (strlen($this->trimmedinsertion())>0 ? " " . $this->trimmedinsertion() : "") . " " . $this->trimmedlast_name();
    }

    public static function nameTrimming($string) {
        return trim(ucfirst(strtolower($string)));
    }

    public static function insertionTrimming($string) {
        return trim(strtolower($string));
    }

    public function trimmedfirst_name() {
        return $this->nameTrimming($this->first_name);
    }

    public function trimmedinsertion() {
        return $this->insertionTrimming($this->insertion);
    }

    public function trimmedlast_name() {
        return $this->nameTrimming($this->last_name);
    }

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

    public function activities() {
        return $this->hasMany(Activity::class, "owner_user_id", "id");
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
