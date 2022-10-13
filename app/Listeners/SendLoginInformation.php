<?php

namespace App\Listeners;

use App\Mail\LoginInformation;
use Illuminate\Support\Facades\Mail;
use App\Events\WorkshopholderGenerated;

class SendLoginInformation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WorkshopholderGenerated $event)
    {
        $userEmail = $event->email;
        $password = $event->password;

        $mailInfo = [
            'userEmail' => $userEmail,
            'password' => $password,
            'url' => Route('login')
        ];

        Mail::to('lifestyledag9@hotmail.com')->send(new LoginInformation($mailInfo));
        $event = null;
    }
}
