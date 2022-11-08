<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public function displayName() {
        return $this->roepnaam . (strlen($this->tussenvoegsel)>0 ? " " . $this->tussenvoegsel : "") . " " . $this->achternaam;
    }

    // public function user() {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }

    // public function created_by() {
    //     return $this->belongsToMany(User::class, 'created_by', 'id');
    // }

    // public function last_edited_by() {
    //     return $this->belongsToMany(User::class, 'last_edited_by', 'id');
    // }

    public function user() {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function created_by() {
        return $this->belongsToMany(User::class, 'id', 'created_by');
    }

    public function last_edited_by() {
        return $this->belongsToMany(User::class, 'id', 'last_edited_by');
    }
}
