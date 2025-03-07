<?php

namespace App\Mail;

use App\Models\Senator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SenatorContacted extends Mailable
{
    use Queueable, SerializesModels;

    private Senator $senator;
    private string $message;
    private string $senderLastName;
    private string $senderEmail;

    /**
     * Create a new message instance.
     */
    public function __construct(Senator $senator, string $message, string $senderLastName, string $senderEmail)
    {
        $this->senator = $senator;
        $this->senderLastName = $senderLastName;
        $this->senderEmail = $senderEmail;
        $this->message = $message;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->senderEmail, $this->senderLastName),
            subject: 'New Senator Correspondence Received',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.senator-contacted',
            with: [
                'senator' => $this->senator,
                'message' => $this->message,
                'senderLastName' => $this->senderLastName,
                'senderEmail' => $this->senderEmail,
            ],
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
