<?php

namespace App\Jobs;

use App\Mail\RemainderEmail;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendReminderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $blog;

    /**
     * Create a new job instance.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;

    }

    /**
     * Execute the job.
     */
    public function handle()
    {

        try {
            $blogs = Blog::where('created_at','<', now())->get();
            \Log::info('Blogs created today: ' . $blogs->count(), ['blogs' => $blogs->toArray()]);


            foreach ($blogs as $blog) {
                $usersWhoNeedReminder = User::whereDoesntHave('blogPostViews', function ($query) use ($blog) {
                    $query->where('blog_id', $blog->id);
                })->get();
                \Illuminate\Support\Facades\Log::info('log working fine',['user'=>$usersWhoNeedReminder]);

                foreach ($usersWhoNeedReminder as $user) {
                    \Illuminate\Support\Facades\Log::info('log working fine',['user'=>$user]);


                    Mail::to($user->email)->send(new RemainderEmail($blog)); // Send an email reminder
                }
            }
        } catch (\Exception $e) {
            \Log::error('Error processing SendReminderEmail job: ' . $e->getMessage());
        }

    }
}
