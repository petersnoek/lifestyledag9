<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class TestController extends Controller
{
  public function mailSend() {
    $email = 'mail@hotmail.com';

    $mailInfo = [
      'url' => 'http://lifestyledag9.itenmedia.nl/public/aanmelden'
    ];

    Mail::to($email)->send(new TestMail($mailInfo));

    return response()->json([
      'message' => 'Mail has sent.'
    ], Response::HTTP_OK);
  }
}
