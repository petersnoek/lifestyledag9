<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ClassCodePattern implements Rule
{
    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
      return preg_match('/^[^A-Za-z0-9]+$/', $value);
    }

    public function message()
    {
        return 'Error: Allen nummers en letters zijn toegestaan.';
    }
}