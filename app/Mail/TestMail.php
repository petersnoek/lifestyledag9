<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailInfo;

    public function __construct($mailInfo)
    {
        $this->mailInfo = $mailInfo;
    }

    public function build()
    {
        return $this->subject('Inschrijvingen workshop')
            ->markdown('emails.testMail')
            ->with('mailInfo', $this->mailInfo);
    }
}
