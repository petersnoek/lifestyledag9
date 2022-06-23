<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class AanmeldSession {   
  public function hasData() {
    $activiteit = Session::get('activiteit');
    $beschrijving = Session::get('beschrijving');
    $ronde = Session::get('ronde');
    $capaciteit = Session::get('capaciteit');
    
    if ($activiteit !== null && $beschrijving !== null && $ronde !== null && $capaciteit !== null) {
      // var_dump('Alle velden zijn juist ingevuld');
      return true;
    } else {
      // var_dump('Niet alle velden zijn juist ingevuld');
      return false;
    }
  }
}
