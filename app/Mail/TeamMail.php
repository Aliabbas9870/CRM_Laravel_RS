<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TeamMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;
    public $attachment;

    /**
     * Create a new message instance.
     */
    public function __construct(array $mailData, $attachment = null)
    {
        $this->mailData = $mailData;
        $this->attachment = $attachment;
    }

    public function build()
    {
        $email = $this->subject($this->mailData['subject'])  // Set subject dynamically
                      ->view('mail.team')  // Make sure the view is correct
                      ->with('mailData', $this->mailData);  // Pass mailData to the view

        // Attach file if provided
        if ($this->attachment) {
            $email->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),  // Set the filename
                'mime' => $this->attachment->getMimeType(),  // Set the MIME type
            ]);
        }

        return $email;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Team Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
