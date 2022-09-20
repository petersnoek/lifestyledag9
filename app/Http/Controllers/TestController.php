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
      'url' => 'http://127.0.0.1:8000/aanmelden'
    ];

    Mail::to($email)->send(new TestMail($mailInfo));

    return response()->json([
      'message' => 'Mail has sent.'
    ], Response::HTTP_OK);
  }
}