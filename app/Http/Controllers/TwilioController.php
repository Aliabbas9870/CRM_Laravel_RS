<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;

class TwilioController extends Controller
{
    public function Sms()
    {
        return view('backend.test');
    }

    public function SendSMS(Request $request)
    {
        // Validate phone number and message
        $request->validate([
            'to' => 'required|digits_between:10,15',
            'message' => 'required|string'
        ]);

        try {
            // Twilio credentials from .env
            $account_Sid = env('TWILIO_SID');
            $account_token = env('TWILIO_TOKEN');
            $number = env('TWILIO_FROM'); // Your Twilio phone number

            // Create Twilio client
            $client = new Client($account_Sid, $account_token);

            // Send SMS
            $client->messages->create("+92" . $request->to, [
                'from' => $number,
                'body' => $request->message,
            ]);

            return back()->with('success', 'Message Sent Successfully!');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // public function MakeCall(Request $request)
    // {
    //     // Validate phone number
    //     $request->validate([
    //         'to' => 'required|digits_between:10,15'
    //     ]);

    //     try {
    //         // Twilio credentials from .env
    //         $account_Sid = env('TWILIO_SID');
    //         $account_token = env('TWILIO_TOKEN');
    //         $number = env('TWILIO_FROM'); // Your Twilio phone number

    //         // Create Twilio client
    //         $client = new Client($account_Sid, $account_token);

    //         // Make the call
    //         $call = $client->calls->create(
    //             "+92" . $request->to, // Recipient's phone number
    //             $number, // Your Twilio number
    //             [
    //                 'url' => 'http://demo.twilio.com/docs/voice.xml' // URL for the Twilio XML instructions
    //             ]
    //         );

    //         return back()->with('success', 'Call Initiated Successfully!');
    //     } catch (\Exception $e) {
    //         return back()->with('error', $e->getMessage());
    //     }
    // }

    public function makeCall(Request $request)
{
    $request->validate([
        'to' => 'required|numeric',
    ]);

    try {
        $client = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        $to = '+92' . $request->input('to'); // Append country code (adjust if needed)

        $client->calls->create(
            $to, // The recipient's number
            '2407700017', // Your Twilio number as the caller ID
            [
                'twiml' => '<Response><Dial>' . '2407700017' . '</Dial></Response>' // Connects the call back to this number for live conversation
            ]
        );

        return redirect()->back()->with('success', 'Call initiated successfully. You will be connected shortly.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

    public function handleCall(Request $request)
{
    // TwiML response to dial the other number
    $response = new \Twilio\TwiML\VoiceResponse();
    $dial = $response->dial();
    $dial->number('+92'); // Replace with the phone number you want to connect to

    return response($response, 200)->header('Content-Type', 'text/xml');
}

}
