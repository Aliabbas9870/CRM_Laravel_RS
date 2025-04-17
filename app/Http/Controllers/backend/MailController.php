<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{

    // Create a Mailable class for sending email.

public function sendEmailUser(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'email' => 'required|email',
        'subject' => 'required|string',
        'body' => 'required|string',
    ]);

    // Send email
    Mail::to($request->email)
        ->send(new SendMail($request->subject, $request->body));

    // Check if email was successfully sent
    if (Mail::failures()) {
        return back()->withErrors('Failed to send the email.');
    }

    return back()->with('success', 'Email sent successfully!');
}






public function sendEmailForm(Request $request)
{
    $emails = $request->input('email'); // This should be an array from the form

    // Check if emails are provided and validate
    if (empty($emails)) {
        return back()->withErrors(['error' => 'No emails selected or invalid input']);
    }

    // Optionally, log the emails to see what's being passed
    // Log::info('Selected Emails: ', $emails);

    // Process the selected emails as needed, e.g., passing to a view for confirmation
    return view('mail.sendEmailFrom', ['to_emails' => $emails]);
}





public function sendCustomEmail(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'to_emails' => 'required|array',
        'to_emails.*' => 'email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
        'attachment' => 'nullable|file|max:2048'
    ]);

    $subject = $validatedData['subject'];
    $message = $validatedData['message'];
    $attachment = $request->file('attachment');

    // Prepare the mail data
    $mailData = [
        'subject' => $subject,
        'message' => $message
    ];

    // Check if it's a single email or multiple emails and send accordingly
    $emails = $validatedData['to_emails'];

    // Send emails to the recipients
    foreach ($emails as $email) {
        Mail::to($email)->send(new SendMail($mailData, attachment: $attachment));
    }

    // Mail::to($request->email)
    //     ->send(new SendMail($request->subject, $request->body));


    // Redirect to /admin page with a success message
    return redirect('/admin')->with('success', 'Emails sent successfully!');
}



}
