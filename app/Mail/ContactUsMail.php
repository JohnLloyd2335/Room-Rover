<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    private string $name;
    private string $email;
    private string $message_content;

    /**
     * Create a new message_content instance.
     */
    public function __construct($name,$email,$message_content)
    {
        $this->name = $name;
        $this->email= $email;
        $this->message_content = $message_content;
    }

    /**
     * Get the message_content envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Us Mail',
        );
    }

    /**
     * Get the message_content content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.contact_us_mail',
            with : [
                'name' => $this->name,
                'email' => $this->email,
                'message_content' => $this->message_content
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
