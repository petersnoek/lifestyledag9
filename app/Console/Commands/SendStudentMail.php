<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Mail\Studentmail;
use App\Models\Enlistment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
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

        $users = Enlistment::select('user_id')->distinct()->get();

        foreach ($users as $user) {
            $enlistments = Enlistment::where('user_id', $user['user_id'])->get();


            // $activiteiten = Event::where("enlist_stops_at", $dateNow)->first()->activities()->get());
            // $activiteiten = Event::where("enlist_stops_at", "2022-10-10 15:10:00")->first()->activities()->where("id", 5)->get();

            $student = $enlistments->first()->user;
            $mailInfo = [
                'student' => $student->name,
                'email' => $student->email,
            ];

            $activities = [];

            foreach ($enlistments as $enlistment) {
                $activityInfo = [
                    'activity' => $enlistment->activity->name,
                    'rounds' => $enlistment->round->round,
                    'start_time' => $enlistment->round->start_time
                ];

                $activities[] = $activityInfo;
            }
            Mail::to($mailInfo['email'])->send(new Studentmail($mailInfo, $activities));
            // Mail::to($mailInfo["email"])->send(new Studentmail($mailInfo));

            $this->info('workshop information sent to student owner');
        }
    }
}
