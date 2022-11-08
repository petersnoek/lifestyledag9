<?php

namespace App\Http\Controllers;

use App\Models\AanmeldSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AanmeldController extends Controller {
  // gegevens opslaan
  public function save() {
    $data = AanmeldSession::hasData();
    return view('aanmeldenResult', [
      'data' => $data
    ]);
  }

  // gegevens van aanmeldingsformulier in sessie stoppen
  public function getData(Request $request) {
    $activiteit = $request->input('activiteit');
    $beschrijving = $request->input('beschrijving');
    $ronde = $request->input('ronde');
    $capaciteit = $request->input('capaciteit');

    Session::put($activiteit, $beschrijving, $ronde, $capaciteit);
    Session::save();

    $data = array('activiteit'=>$activiteit, 'beschrijving'=>$beschrijving, 'ronde'=>$ronde, 'capaciteit'=>$capaciteit);
    DB::table('invites')->insert($data);
    return view('aanmeldenEnd');
  }

  // gegevens ophalen uit db en weergeven op de resultaten pagina
  public function show() {
    $aanmeldingen = DB::select('select * from invites');
    return view('contacts/aanmeldenResult',[
      'aanmeldingen' => $aanmeldingen
    ]);
  }
}
