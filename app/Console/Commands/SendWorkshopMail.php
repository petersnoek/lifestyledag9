<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Enlistment;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\WorkshopMail;
use App\Models\Activity;

class SendWorkshopMail extends Command
{
    protected $signature = 'info:day';
    protected $description = 'Send an email to the workshop owner with the participants of the rounds';

    public function handle()
    {
        // Haal de huidige datum op
        $currentDate = Carbon::now();
        $dateNow = $currentDate->format('Y-m-d H:i:s');

        // Haal de workshophouders op waarvan de inschrijfdatum verlopen is
        $getUser = DB::select(
            "SELECT DISTINCT activities.owner_user_id, events.enlist_stops_at, activities.id  
            FROM `activities` 
            INNER JOIN `users`
            ON activities.owner_user_id=users.id
            INNER JOIN `events` 
            WHERE events.enlist_stops_at = '2022-08-31 08:00:00' AND users.workshop_owner = '1'" // $dateNow
        ); 
        // Loop door de opgehaalde workshophouders heen
        $number = 0;
        foreach ($getUser as $key => $value) {
            if(isset($getUser) == true){
                $number++;
                $user = $value->owner_user_id;
                $activity = $value->id;
                $workshophouder = $user;

                // Haal data op per workshophouder voor de mail
                $mailInfo = Enlistment::whereActivityId($activity)->get();

                // Verstuur de mail met data naar de workshophouder
                $userInfo = DB::select(
                    "SELECT DISTINCT activities.owner_user_id, users.name as workshophouder, users.email, activities.name as activity 
                    FROM `activities` 
                    INNER JOIN users 
                    ON activities.owner_user_id = users.id
                    WHERE activities.owner_user_id = $workshophouder"
                );

                $studentInfo = DB::select(
                    "SELECT users.name, enlistments.user_id 
                    FROM `enlistments` 
                    INNER JOIN users 
                    ON users.id=enlistments.user_id 
                    WHERE activity_id = $activity"
                );

                Mail::to($userInfo[0]->email)->send(new WorkshopMail($mailInfo, $userInfo, $studentInfo));
                // Mail::to($userInfo[$number]->email)->send(new WorkshopMail($mailInfo));
            }
            $this->info('workshop information sent to workshop owner');
        }
    }   
}