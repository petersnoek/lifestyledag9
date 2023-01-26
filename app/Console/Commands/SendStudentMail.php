<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Mail\StudentMail;
use App\Models\Enlistment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendStudentmail extends Command
{
    protected $signature = 'info:student';
    protected $description = 'Send an email to the student with the enlisted activities';

    public function handle()
    {
        // Haal de huidige datum op
        $currentDate = Carbon::now();
        $dateNow = $currentDate->format('Y-m-d H:i:s');

        //Haal de user_id uit de database en laat dat ID maar 1 keer voorkomen (anders verzend hij de mail 3x)
        $users = Enlistment::select('user_id')->distinct()->get();

        //voor elke gebruiker loop door zijn gegevens heen en zet die data in een array om in de mail te zetten.
        foreach ($users as $user) {
            $enlistments = Enlistment::where('user_id', $user['user_id'])->get()->sortBy('round');

            $student = $enlistments->first()->user;
            $mailInfo = [
                'student' => $student->first_name,
                'email' => $student->email,
            ];

            $activities = [];
            //loop door alle enlistmens per gebruiker en pak de data per activiteit en zet ze in de $activities array.
            foreach ($enlistments as $enlistment) {
                $activityInfo = [
                    'activity' => $enlistment->activity->name,
                    'rounds' => $enlistment->eventrounds->round,
                    'start_time' => $enlistment->eventrounds->start_time
                ];

                $activities[] = $activityInfo;
            }
            Mail::to($mailInfo['email'])->send(new StudentMail($mailInfo, $activities));

            $this->info('enlistment information was sent to the students email');
        }
    }
}
