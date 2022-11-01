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
       $activiteiten = Event::where("enlist_stops_at", $dateNow)->first()->activities()->get();
       // $activiteiten = Event::where("enlist_stops_at", "2022-08-31 08:00:00")->first()->activities()->get();

       // Loop door de activiteiten heen en pak alle data hiervan
        foreach ($activiteiten as $activity) {
            $workshophouder = $activity->user()->first();
            $round_ids_select = $activity->enlistments()->distinct('round_id')->select('round_id')->get()->toArray();
            $round_ids = [];
            
            foreach ($round_ids_select as $key => $value) {
                if (isset($value["round_id"])) {
                    array_push($round_ids, $value["round_id"]);
                }
            }
            
            $eventrounds = Eventround::whereIn('id', $round_ids)->get()->sortBy('round');

            $mailInfo = [
                'activity' => $activity->name,
                'workshophouder' => $workshophouder->name,
                'email' => $workshophouder->email,
                'eventrounds' => $eventrounds
            ];

            // Verstuur de mail
            Mail::to($mailInfo["email"])->send(new WorkshopMail($mailInfo));
            // Mail::to('lifestyledag9@hotmail.com')->send(new WorkshopMail($mailInfo));

            $this->info('workshop information sent to workshop owner');
        }
    }
}
