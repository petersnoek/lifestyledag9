<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NamePattern implements Rule
{
    public function __construct()
    {
    }
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z0-9_\-., ?!&""\'()]+$/', $value);
    }

    public function message()
    {
        return 'Error: Ongeldige invoer bij "naam". Alleen letters zijn toegestaan';
    }
}