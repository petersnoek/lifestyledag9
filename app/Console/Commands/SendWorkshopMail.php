<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Event;
use App\Mail\WorkshopMail;
use App\Models\Eventround;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWorkshopMail extends Command
{
    protected $signature = 'info:day';
    protected $description = 'Send an email to the workshop owner with the participants of the rounds';

    public function handle()
    {
        // Haal de huidige datum op
        $currentDate = Carbon::now();
        $dateNow = $currentDate->format('Y-m-d H:i:s');
        $dateNow = "2022-08-31 08:00:00";

        // Haal de activiteiten op waar de huidige datum verlopen is
        $number = 4;
        $activiteiten = Event::where("enlist_stops_at", $dateNow)->first()->activities()->where("id", $number)->get();

        // Loop door de resultaten van de query
        foreach ($activiteiten as $activity) {
            $workshophouder = $activity->user()->first();
            $round_ids = $activity->enlistments()->distinct('round_id')->select('round_id')->get()->toArray();
            $eventrounds = Eventround::whereIn('id', [$round_ids])->get()->sortBy('round');

            $mailInfo = [
                'activity' => $activity->name,
                'workshophouder' => $workshophouder->name,
                'email' => $workshophouder->email,
                'eventrounds' => $eventrounds
            ];

            // Verstuur de mail
            Mail::to($mailInfo["email"])->send(new WorkshopMail($mailInfo));

            $this->info('workshop information sent to workshop owner');
        }
    }
}
