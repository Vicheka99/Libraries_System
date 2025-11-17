<?php

namespace App\Mail;

use App\Models\Borrower;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BorrowerStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $borrower;
    public $status;
    public $messageText;

    /**
     * Create a new message instance.
     */
    public function __construct(Borrower $borrower, string $status, string $messageText)
    {
        $this->borrower = $borrower;
        $this->status = $status;
        $this->messageText = $messageText;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->status === 'confirmed'
            ? 'Your Borrower Request Has Been Confirmed'
            : 'Your Borrower Request Has Been Rejected';

        return new Envelope(
            subject: $subject,
            replyTo: [$this->borrower->email],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.borrower_status',
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }
}
