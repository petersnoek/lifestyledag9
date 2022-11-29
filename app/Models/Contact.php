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
}
