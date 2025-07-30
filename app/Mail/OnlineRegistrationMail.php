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
    protected $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($registration, $pdf)
    {
        $this->registration = $registration;
        $this->pdf = $pdf;
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
        return [
            Attachment::fromData(fn () => $this->pdf, 'ARPS-' . $this->registration->id . '.pdf')
            ->withMime('application/pdf'),
        ];
    }
}
