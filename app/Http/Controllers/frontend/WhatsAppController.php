<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    protected $twilio;

    public function __construct()
    {
        $sid = env('TWILIO_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $this->twilio = new Client($sid, $token);
    }

    /**
     * Send a WhatsApp message.
     */




     public function sendMessage(Request $request)
     {
         // Validate the message input
         $validatedData = $request->validate([
             'message' => 'required|string',  // Ensure the 'message' is a string
         ]);

         // Get the validated data
         $message = $validatedData['message']; // Message to send
         $to = '+923216700622';  // Predefined recipient number

         // Send the WhatsApp message using Twilio
         try {
             $from = env('TWILIO_WHATSAPP_FROM');  // Twilio WhatsApp number

             $this->twilio->messages->create(
                 "whatsapp:$to",  // Recipient's WhatsApp number (in international format)
                 [
                     'from' => $from,  // Twilio WhatsApp number
                     'body' => $message  // Message body
                 ]
             );

             // Set success message in session
             return redirect()->back()->with('success', 'WhatsApp message sent successfully!');
         } catch (\Exception $e) {
             return response()->json(['error' => 'Failed to send WhatsApp message: ' . $e->getMessage()], 500);
         }
     }


    //  public function sendMessage(Request $request)
    //  {
    //      // Validate the input data
    //      $validatedData = $request->validate([
    //          'to' => 'required|string',  // Ensure the 'to' number is a valid string
    //          'message' => 'required|string',  // Ensure the 'message' is a string
    //      ]);

    //      // Get the validated data
    //      $to = $validatedData['to']; // Recipient's number (should be in international format)
    //      $message = $validatedData['message']; // Message to send

    //      // Automatically prepend +92 if the number starts with a 0 (for Pakistan)
    //      if (preg_match('/^0[0-9]{9}$/', $to)) {
    //          $to = '+92' . substr($to, 1);  // Remove the leading zero and prepend +92
    //      }

    //      // Check if the number is valid in the correct format (e.g., +92xxxxxxxxx)
    //      if (!preg_match('/^\+92[0-9]{9}$/', $to)) {
    //          return response()->json(['error' => 'Invalid Pakistani phone number format. Please use +92 followed by the number.'], 400);
    //      }

    //      $from = env('TWILIO_WHATSAPP_FROM');  // Twilio WhatsApp number

    //      try {
    //          // Send the WhatsApp message using Twilio
    //          $this->twilio->messages->create(
    //              "whatsapp:$to",  // Recipient's WhatsApp number (in international format)
    //              [
    //                  'from' => $from,  // Twilio WhatsApp number
    //                  'body' => $message  // Message body
    //              ]
    //          );

    //          return response()->json(['message' => 'WhatsApp message sent successfully']);
    //      } catch (\Exception $e) {
    //          return response()->json(['error' => 'Failed to send WhatsApp message: ' . $e->getMessage()], 500);
    //      }
    //  }


    public function sendMessageFromLink($number)
    {
        // Custom message to send
        $message = 'Hello, this is an automated message sent from the Twilio system.';

        // Twilio "from" number for WhatsApp (formatted for WhatsApp)
        $from = env('TWILIO_WHATSAPP_FROM');

        // Send the WhatsApp message using Twilio
        try {
            $this->twilio->messages->create(
                "whatsapp:$number", // Recipient's WhatsApp number
                [
                    'from' => $from,
                    'body' => $message
                ]
            );

            return redirect()->back()->with('success', 'WhatsApp message sent successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to send message: ' . $e->getMessage());
        }
    }

    // Other methods for resource handling (e.g., create, store, show, etc.) can remain as is or be removed if not needed.
}
