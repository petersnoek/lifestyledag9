<?php
 
namespace App\Console;
 
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
 
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\WordOfTheDay::class,
    ];
 
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // schedule command
        $schedule->command('word:day')
        ->twiceDaily(8, 18);

        // Laravel also allows you to schedule shell commands 
        // so that you could issue commands to the operating system and external applications.
        $schedule->exec(
            'cp -r ' . base_path() . " " . base_path('../backups/' . date('jY'))
        )->monthly();
    }
 
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
 
        require base_path('routes/console.php');
    }
}