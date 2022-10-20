<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendWorkshopMail::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Schedule command
        $currentDate = Carbon::now();
        // $dateNow = $currentDate->format('Y-m-d H:i:s');
        // $endDate = Event::where('enlist_stops_at', $dateNow)->select('enlist_stops_at');
        $currentDate = "2022-10-10 15:10:00";
        $endDate = Event::where('enlist_stops_at', "2022-10-10 15:10:00")->select('enlist_stops_at')->first();

        if($currentDate == $endDate['enlist_stops_at']){
            $schedule->command('info:day')
            ->when(function() use($endDate){ 
            return Carbon::create($endDate['enlist_stops_at'])->isPast();
            });
        }
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
