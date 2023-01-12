<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class InsertionPattern implements Rule
{
  public function __construct()
  {

  }
  public function passes($attribute, $value)
  {
    return preg_match('/^[a-zA-Z\s]*$/', $value);
  }

  public function message()
  {
    return 'Error: Alleen letters en spaties zijn toegestaan bij je tussenvoegsel.';
  }
}