<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NamePattern implements Rule
{
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z0-9_\-., ?!]+$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not a valid :attribute. only letters, numbers, spaces, and some special characters are allowed.';
    }
}