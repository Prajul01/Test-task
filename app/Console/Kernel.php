<?php

namespace App\Console;

use App\Jobs\SendReminderEmail;
use App\Models\Blog;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\PurgeOldBlogs::class,

    ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
//        $schedule->command('blogs:purge')->everyThirtyMinutes();


        $schedule->call(function () {
            $blog = Blog::latest()->first();
            if ($blog) {
                dispatch(new \App\Jobs\SendReminderEmail($blog));
                Log::info('Dispatched SendReminderEmail job for blog: ' . $blog->id);
            }
        })->everyMinute();


        \Illuminate\Support\Facades\Log::info('Reminder email job executed.');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
