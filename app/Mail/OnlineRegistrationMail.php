<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OnlineRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $registration;

    /**
     * Create a new message instance.
     */
    public function __construct($registration)
    {
        $this->registration = $registration;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Online Registration - ' . $this->registration->id,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.online-registrations.success',
            with: [
                'registration' => $this->registration,
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
        // Attach the PDF file generated for the registration
        // PDF in string format
        $filename = 'ARPS-' . $this->registration->id . '.pdf';
        // Define the file path
        $file = storage_path('app/private/online-registrations/' . $filename);

        return [
            Attachment::fromPath($file),
        ];
    }
}
