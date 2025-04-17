<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Mail\UserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserMailController extends Controller
{
    // Show the email composition form
  // UserMailController.php

// admin side form
  public function showEmailFormAd(Request $request)
{
    $email = $request->query('email', ''); // Fetch the email or set it as an empty string if not provided
    return view('backend.compose', compact('email'));
}

//   user side form
public function showEmailForm(Request $request)
{
    $email = $request->query('email', '');
    return view('frontend.compose', compact('email'));
}

    // Send the email from the user side
    public function sendUserEmail(Request $request)
    {
        // Validate email form data
        $validatedData = $request->validate([
            'to_email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'attachment' => 'nullable|file|max:2048', // Attachment validation
        ]);

        // Prepare email data
        $mailData = [
            'subject' => $validatedData['subject'],
            'message' => $validatedData['message']
        ];

        // Handle file attachment if any
        $attachment = $request->file('attachment');

        // Send the email using the UserMail Mailable
        Mail::to($validatedData['to_email'])->send(new UserMail($mailData, $attachment));

        // Redirect back with a success message
        return back()->with('success', 'Email sent successfully!');
    }





}
