<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class TestController extends Controller
{
  public function mailSend() {
    $email = 'mail@hotmail.com';

    $mailInfo = [
      'url' => Route('aanmelden.index')
    ];

    Mail::to($email)->send(new TestMail($mailInfo));

    return response()->json([
      'message' => 'Mail has sent.'
    ], Response::HTTP_OK);
  }
}
