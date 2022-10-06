<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class TestController extends Controller {
  public function mailSend() {
    $email = 'lifestyledag@hotmail.com';

    $mailInfo = DB::select( 
      "SELECT enlistments.round_id, users.name
      FROM enlistments 
      INNER JOIN users 
      ON enlistments.user_id=users.id
      WHERE enlistments.activity_id = 1"
    );
   
    var_dump($mailInfo);

    Mail::to($email)->send(new TestMail($mailInfo));

    return response()->json([
      'message' => 'Mail has sent.'
    ], Response::HTTP_OK);
  }
}