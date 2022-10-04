<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendWorkshopMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'info:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a email to the workshop owner with information of the rounds';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // $endDate = date('2022-12-04 09:00:00');
        // $currentDate = date('Y-m-d H:i:s');

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
             
            $this->info('worksop information sent to all workshop owners');
        // }
    }
}
