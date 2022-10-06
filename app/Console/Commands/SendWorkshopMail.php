<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWorkshopMail extends Command
{
    protected $signature = 'info:day';

    protected $description = 'Send a email to the workshop owner with information of the rounds';

    public function handle()
    {
        // $endDate = date('2022-12-04 09:00:00');
        // $currentDate = Carbon::now();

        // if($currentDate > $endDate){
            // $activityOwner = 'Workshophouder';
            $round = 1;
            $roundUser = ['Pieter', 'Joshua', 'Bart', 'Dewi', 'Bas'];
    
            $info = [
                // 'activityOwner' => $activityOwner,
                'round' => $round,
                'roundUser' => $roundUser
            ];
             
            $users = User::all();
            foreach ($users as $user) {
                Mail::raw($info, function ($mail) use ($user) {
                    $mail->from('lifestyledag@gmail.com');
                    $mail->to($user->email)
                        ->subject('Inschrijvingen workshop');
                });
            }
             
            $this->info('worksop information sent to workshop owner');
        // }
    }
}
