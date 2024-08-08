<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsLetter extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $subject;
    public $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $subject, $content)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->content = $content;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: $this->subject,

        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.newsletter',
            with: [
                'user' => $this->user,
                'content' => $this->content, // Pass the dynamic content
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
