<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    public function displayName() {
        return $this->first_name . (strlen($this->insertion)>0 ? " " . $this->insertion : "") . " " . $this->last_name;
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
