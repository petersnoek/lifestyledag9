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
    return preg_match("/^[a-zA-Z0-9]+$/", $value);
  }

  public function message()
  {
    return 'Error: Klascode mag alleen uit letters en nummers bestaan.';
  }
}