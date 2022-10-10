<?php
 
namespace App\Console;
 
use Illuminate\Console\Scheduling\Schedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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
        $dateNow = $currentDate->format('Y-m-d H:i:s');
        $endDate = DB::select("SELECT enlist_stops_at FROM `events` WHERE enlist_stops_at = $dateNow");

        if($currentDate == $endDate){ 
            $schedule->command('info:day')
            ->$endDate(10);
        }

        // Schedule command
        // $schedule->command('info:day')
        //     ->daily(10);

        // Laravel also allows you to schedule shell commands 
        // so that you could issue commands to the operating system and external applications.
        // $schedule->exec(
        //     'cp -r ' . base_path() . " " . base_path('../backups/' . date('jY'))
        // )->monthly();
    }
 
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}