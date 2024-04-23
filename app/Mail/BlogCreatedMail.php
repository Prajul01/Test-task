<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BlogCreatedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $blog;

    /**
     * Create a new message instance.
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Blog Created Mail',
        );
    }

    public function build()
    {
        return $this->from('example@example.com')
            ->view('emails.blog.notification')
            ->with([
                'title' => $this->blog->title,
                'content' => $this->blog->content
            ]);
    }
}
