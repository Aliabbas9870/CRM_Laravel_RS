<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;  // Declare the mail data array
    public $attachment; // Declare the attachment property

    // Constructor now accepts $mailData array and $attachment
    public function __construct(array $mailData, $attachment = null)
    {
        $this->mailData = $mailData;
        $this->attachment = $attachment;
    }

    // Build the email
    public function build()
    {
        $email = $this->subject($this->mailData['subject'])  // Set subject dynamically
                      ->view('mail.task')  // Make sure the view is correct
                      ->with('mailData', $this->mailData);  // Pass mailData to the view

        // Attach the file if provided
        if ($this->attachment) {
            $email->attach($this->attachment->getRealPath(), [
                'as' => $this->attachment->getClientOriginalName(),
                'mime' => $this->attachment->getClientMimeType(),
            ]);
        }

        return $email;
    }
}
