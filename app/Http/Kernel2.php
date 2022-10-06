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
        $getDate = DB::select("SELECT starts_at  FROM `events` WHERE id = 1");
        $date = implode(" ", $getDate);
        var_dump($date);
        $endDate = Carbon::create($date)->subDays(1);
        var_dump($endDate);
        $currentDate = Carbon::now();

        if($currentDate == $endDate){ 
            $schedule->command('info:day')
            ->$endDate(8);
        }

        // Schedule command
        // $schedule->command('info:day')
        //     ->daily(8);

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