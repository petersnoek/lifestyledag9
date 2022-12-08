<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FullnamePattern implements Rule
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
        return preg_match('/^[a-zA-Z][a-zA-Z\s]*[a-zA-Z]$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Invalid :attribute. only letters, numbers, spaces, and some special characters are allowed.';
    }
}
