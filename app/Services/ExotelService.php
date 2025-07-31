<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExotelService
{
    protected $sid;
    protected $token;
    protected $callerId;

    public function __construct()
    {
        $this->sid = config('services.exotel.sid');
        $this->token = config('services.exotel.token');
        $this->callerId = config('services.exotel.caller_id');
    }

    public function call($from, $to)
    {
        $url = "https://api.exotel.com/v1/Accounts/{$this->sid}/Calls/connect.json";

        return Http::withBasicAuth($this->sid, $this->token)->post($url, [
            'From' => $from,
            'To' => $to,
            'CallerId' => $this->callerId,
            'CallType' => 'trans',
            'StatusCallback' => route('exotel.status'),
        ])->json();
    }
}
