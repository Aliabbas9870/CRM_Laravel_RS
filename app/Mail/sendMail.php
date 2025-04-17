<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mailData;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @param array $mailData - Contains the subject and message for the email.
     * @param mixed $attachment - The attachment file (optional).
     */
    public function __construct($mailData, $attachment = null)
    {
        $this->mailData = $mailData;
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     // Start building the email with subject and view
    //     $email = $this->subject($this->mailData['subject'])
    //                   ->view('mail.sendEmail')
    //                   ->with('mailData', $this->mailData);

    //     // If an attachment is provided, attach the file
    //     if ($this->attachment) {
    //         // Ensure attachment is a file
    //         if ($this->attachment instanceof \Illuminate\Http\UploadedFile) {
    //             $email->attach($this->attachment->getRealPath(), [
    //                 'as' => $this->attachment->getClientOriginalName(),
    //                 'mime' => $this->attachment->getMimeType(),
    //             ]);
    //         }
    //     }

    //     // Handle recipients (single or multiple)
    //     if (isset($this->mailData['to_emails'])) {
    //         $emails = $this->mailData['to_emails'];

    //         if (is_array($emails)) {
    //             $email->to($emails); // Multiple recipients
    //         } else {
    //             $email->to($emails); // Single recipient
    //         }
    //     }

    //     return $email;
    // }


    public function build()
    {
        // Start building the email with subject and view
        $email = $this->subject($this->mailData['subject'])
                      ->view('mail.sendEmail')
                      ->with('mailData', $this->mailData);

       // Replace with your desired sender email and name

        // If an attachment is provided, attach the file
        if ($this->attachment) {
            // Ensure attachment is a file
            if ($this->attachment instanceof \Illuminate\Http\UploadedFile) {
                $email->attach($this->attachment->getRealPath(), [
                    'as' => $this->attachment->getClientOriginalName(),
                    'mime' => $this->attachment->getMimeType(),
                ]);
            }
        }

        // Handle recipients (single or multiple)
        if (isset($this->mailData['to_emails'])) {
            $emails = $this->mailData['to_emails'];

            if (is_array($emails)) {
                $email->to($emails); // Multiple recipients
            } else {
                $email->to($emails); // Single recipient
            }
        }

        return $email;
    }




}
