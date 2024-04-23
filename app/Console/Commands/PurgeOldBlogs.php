<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Console\Command;

class PurgeOldBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blogs:purge {hours=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $hours = $this->argument('hours');

        if (!is_numeric($hours) || $hours < 1) {
            $this->error('The hours argument must be a numeric value greater than 0.');
            return 1;
        }

        $threshold = Carbon::now()->subHours($hours);

        $count = Blog::where('created_at', '<', $threshold)->delete();

        $this->info("Successfully deleted $count blogs older than $hours hours.");

        return 0;
    }
}
