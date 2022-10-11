<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use App\Models\Enlistment;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\WorkshopMail;
use Mockery\Undefined;

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
            "SELECT activities.owner_user_id, events.enlist_stops_at  
            FROM `activities` 
            INNER JOIN `events` 
            WHERE events.enlist_stops_at = '2022-08-31 08:00:00' AND activities.owner_user_id = '2'" // $dateNow
        ); 

        // Loop door de opgehaalde workshophouders heen
        $number = 0;
        foreach ($getUser as $key => $value) {
            if(isset($getUser) == true){
                $number ++;
                $user = $getUser[$number]->owner_user_id;
                $workshophouders = $user;
                var_dump($workshophouders);

                // Haal data op per workshophouder voor de mail
                $mailInfo = Enlistment::whereName($workshophouders)->get();
                var_dump($mailInfo);

                // Verstuur de mail met data naar de workshophouder
                // foreach ($workshophouders as $workshophouder) {
                //     Mail::to($workshophouder->email)->send(new WorkshopMail($mailInfo));
                // }
            }
            $this->info('workshop information sent to workshop owner');
        }
    }   
}




// public function handle()
// {
//     // Haal de huidige datum op
//     $currentDate = Carbon::now();
//     $dateNow = $currentDate->format('Y-m-d H:i:s');

//     // Haal de workshophouders op waarvan de inschrijfdatum verlopen is
//     $getUser = DB::select(
//         "SELECT activities.owner_user_id, events.enlist_stops_at  
//         FROM `activities` 
//         INNER JOIN `events` 
//         WHERE events.enlist_stops_at = '2022-08-31 08:00:00' AND activities.owner_user_id = 'Dewi'" // $dateNow
//     ); 

//     $number = 0;
//     foreach ($getUser as $key => $value) {
//         if(!$getUser){
//             $number ++;
//             $user = $getUser[$number]->owner_user_id;
//             $workshophouders = $user;

//             // Haal de data van de activiteit op per workshophouder en haal de mail op van de workshophouder
//             $mailInfo = DB::select( 
//                 "SELECT DISTINCT contacts.email, enlistments.round_id, enlistments.event_id, users.name as student, activities.name as activity, activities.owner_user_id as workshophouder, eventrounds.start_time, eventrounds.end_time
//                 FROM enlistments 
//                 INNER JOIN users
//                 ON enlistments.user_id=users.id
//                 INNER JOIN activities
//                 ON enlistments.activity_id=activities.id
//                 INNER JOIN activities as activities2
//                 ON enlistments.activity_id=activities.id
//                 INNER JOIN eventrounds
//                 ON enlistments.round_id=eventrounds.id
//                 INNER JOIN contacts 
//                 WHERE activities.owner_user_id = 'Dewi'" // $workshophouders
//             );

//             // Verstuur de mail met de opgehaalde data
//             foreach (str_split($workshophouders) as $value) {
//                 foreach ($value as $workshophouder) {
//                     // Mail::to($workshophouder->email)->send(new WorkshopMail($mailInfo));
//                     Mail::to('test@gmail.com')->send(new WorkshopMail($mailInfo));
//                 };
//             }
//         }
//         $this->info('workshop information sent to workshop owner');
//     }
// } 