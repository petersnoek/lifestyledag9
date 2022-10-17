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

        $activiteiten = Event::where("enlist_stops_at", "2022-08-31 08:00:00")->first()->activities()->get();
        $activiteiten = Event::where("enlist_stops_at", "2022-08-31 08:00:00")->first()->activities()->where("id", 4)->get(); // deze regel is om van 1 activiteit de mail te sturen anders stuur je ze van allemaal en krijg je 20 mails binnen.

        foreach ($activiteiten as $activity) {
            $workshophouder = $activity->user()->first();
            $round_ids = $activity->enlistments()->distinct('round_id')->select('round_id')->get()->toArray();
            $eventrounds = Eventround::whereIn('id', [$round_ids])->get()->sortBy('round');

            $mailInfo = [
                'activity' => $activity->name,
                'workshophouder' => $workshophouder->name,
                'eventrounds' => $eventrounds
            ];

            Mail::to('lifestyledag9@hotmail.com')->send(new WorkshopMail($mailInfo));

            // $this->info('workshop information sent to workshop owner');
            $this->info('workshop information sent to lifestyledag9@hotmail.com');
        }
    }
}
