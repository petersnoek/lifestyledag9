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
        return preg_match('/^[A-Za-z]+$/', $value);
    }

    public function message()
    {
        return 'Error: Alleen letters zijn toegestaan.';
    }
}