<?php
 
namespace App\Console;
 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
 
class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SendWorkshopMail::class,
    ];
 
    protected function schedule(Schedule $schedule)
    {
        // schedule command
        $schedule->command('info:day')
        ->twiceDaily(8, 18);

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