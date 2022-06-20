<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

class AanmeldSession {   
  public function hasData() {
    $activiteit = Session::get('Activiteit');
    $beschrijving = Session::get('Beschrijving');
    $ronde = Session::get('Ronde');
    $capaciteit = Session::get('Capaciteit');
    
    if ($activiteit !== null && $beschrijving !== null && $ronde !== null && $capaciteit !== null) {
      var_dump('Alle velden zijn juist ingevuld');
      return true;
    } else  {
      var_dump('Niet alle velden zijn juist ingevuld');
      return false;
    }
  }
}
