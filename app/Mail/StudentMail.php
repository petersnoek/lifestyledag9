<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailInfo;
    public $activityInfo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailInfo, $activityInfo)
    {
        $this->mailInfo = $mailInfo;
        $this->activityInfo = $activityInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Inschrijvingen workshop')
            ->markdown('emails.StudentMail')
            ->with(['mailInfo' => $this->mailInfo, 'activityInfo' => $this->activityInfo]);
    }
}
