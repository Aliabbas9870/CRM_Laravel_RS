<?php
namespace App\Services;

use Twilio\Rest\Client;

class TwilioCallService
{
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
    }

    public function makeCall($toNumber)
    {
        return $this->twilio->calls->create(
            $toNumber, // destination
            env('TWILIO_FROM'), // your Twilio number
            [
                'url' => 'https://handler.twilio.com/twiml/EHxxxxxx' // create TwiML Bin or route to answer
            ]
        );
    }
}
