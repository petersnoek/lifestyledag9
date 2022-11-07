<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendStudentmail::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Haal de huidige datum op en zet deze in een query
        $currentDate = Carbon::now();
        // $dateNow = $currentDate->format('Y-m-d H:i:s');
        // $endDate = Event::where('enlist_stops_at', $dateNow)->select('enlist_stops_at');

        // Vaste waardes om te testen
        $currentDate = "2022-08-31 08:00:00";
        $endDate = Event::where('enlist_stops_at', "2022-08-31 08:00:00")->select('enlist_stops_at')->first();

        if (isset($endDate)) {
            // Als de huidige datum gelijk is aan de datum in de db wordt de schedule uitgevoerd
            if ($currentDate == $endDate['enlist_stops_at']) {
                $schedule->command('info:day')
                    ->when(function () use ($endDate) {
                        return Carbon::create($endDate['enlist_stops_at'])->isPast();
                    });
                $schedule->command('info:student')
                    ->when(function () use ($endDate) {
                        return Carbon::create($endDate['enlist_stops_at'])->isPast();
                    });
            }
        }
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
}
