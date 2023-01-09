<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public function displayName() {
        return $this->firstname . (strlen($this->insertion)>0 ? " " . $this->insertion : "") . " " . $this->lastname;
    }

    public static function nameTrimming($string) {
        return trim(ucfirst(strtolower($string)));
    }

    public static function InsertionTrimming($string) {
        return trim(strtolower($string));
    }

    public function trimmedFirstName() {
        return $this->nameTrimming($this->firstname);
    }

    public function trimmedSurName() {
        return $this->InsertionTrimming($this->insertion);
    }

    public function trimmedLastName() {
        return $this->nameTrimming($this->lastname);
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function created_by() {
        return $this->belongsToMany(User::class, 'created_by', 'id');
    }

    public function last_edited_by() {
        return $this->belongsToMany(User::class, 'last_edited_by', 'id');
    }
}
