<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\Enlistment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
  public function mailSend()
  {
    $email = 'lifestyledag@hotmail.com';

    $mailInfo = Enlistment::whereUserId(Auth::id())->get();

    Mail::to($email)->send(new TestMail($mailInfo));

    return redirect('dashboard');
  }
}
