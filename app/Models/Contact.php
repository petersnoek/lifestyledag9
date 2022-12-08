<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public function displayName() {
        return $this->firstname . (strlen($this->surname)>0 ? " " . $this->surname : "") . " " . $this->lastname;
    }

    public static function nameTrimming($string) {
        return trim(strtolower(ucfirst($string)));
    }

    public static function surNameTrimming($string) {
        return trim(strtolower($string));
    }

    public function trimmedFirstName() {
        return $this->nameTrimming($this->firstname);
    }

    public function trimmedSurName() {
        return $this->surNameTrimming($this->surname);
    }

    public function trimmedLastName() {
        return $this->nameTrimming($this->lastname);
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
