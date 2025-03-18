<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function build()
    {
        return $this->subject('📢 Notre Newsletter')
                    ->view('emails.newsletter')
                    ->with(['content' => $this->content]);
    }
}
