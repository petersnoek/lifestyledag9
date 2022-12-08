<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhonePattern implements Rule
{
    public function __construct()
    {

    }
    public function passes($attribute, $value)
    {
        $pattern = '/^06-[1-9][0-9]{7}$/';
        return preg_match($pattern, $value);
    }

    public function message()
    {
        return 'Alleen cijfers, spaties, min en plus tekens en ';
    }
}
