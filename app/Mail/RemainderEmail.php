<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RemainderEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    public function build()
    {
        return $this->view('emails.blog.reminder')
            ->with([
                'blogTitle' => $this->blog->title,
                'blogDescription' => $this->blog->description
            ]);
    }
}
