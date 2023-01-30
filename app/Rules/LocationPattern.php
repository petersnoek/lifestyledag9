<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LocationPattern implements Rule
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
        return preg_match('/^[a-zA-Z\s]*$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Error: Ongeldige invoer bij "locatie". Alleen letters zijn toegestaan';
    }
}
