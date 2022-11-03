<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'classCode'
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

    // public function contact()
    // {
    //     return $this->hasOne(Contact::class, 'user_id', 'id');
    // }

    // public function contact_created_by()
    // {
    //     return $this->hasMany(Contact::class, 'created_by', 'id');
    // }

    // public function contact_last_edited_by()
    // {
    //     return $this->hasMany(Contact::class, 'last_edited_by', 'id');
    // }

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
}
