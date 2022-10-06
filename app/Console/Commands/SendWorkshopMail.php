<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\WorkshopMail;

class SendWorkshopMail extends Command
{
    protected $signature = 'info:day';

    protected $description = 'Send an email to the workshop owner with the participants of the rounds';

    public function handle()
    {
        $endDate = date('2022-09-04 09:00:00');
        $currentDate = Carbon::now();

        if($currentDate > $endDate){  
            $mailInfo = DB::select( 
                "SELECT DISTINCT enlistments.round_id, enlistments.event_id, users.name, activities.name as activity, activities.executed_by as workshophouder, eventrounds.start_time, eventrounds.end_time
                FROM enlistments 
                INNER JOIN users
                ON enlistments.user_id=users.id
                INNER JOIN activities
                ON enlistments.activity_id=activities.id
                INNER JOIN activities as activities2
                ON enlistments.activity_id=activities.id
                INNER JOIN eventrounds
                ON enlistments.round_id=eventrounds.id
                WHERE activities.executed_by = 'Marc & Peter'"
              );

            $users = User::all();
            foreach ($users as $user) {
                    Mail::to($user->email)->send(new WorkshopMail($mailInfo));
                };
            }
            $this->info('worksop information sent to workshop owner');
        }
    }