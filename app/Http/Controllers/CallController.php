<?php

namespace App\Http\Controllers;
use App\Services\FreJunService;
use App\Models\CallLog;
use Auth;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     */


       public function callNow(Request $request, FreJunService $frejun)
    {
        $clientNumber = $request->input('to');
        $clientName = $request->input('name');
        $agentEmail = Auth::user()->email;

        $response = $frejun->call($agentEmail, $clientNumber, $clientName);

        CallLog::create([
            'agent_email' => $agentEmail,
            'to' => $clientNumber,
            'name' => $clientName,
            'status' => $response['message'] ?? 'initiated',
            'call_id' => $response['data']['call_id'] ?? null,
        ]);

        return back()->with('status', 'Call triggered successfully!');
    }

    public function handleStatus(Request $request)
    {
        CallLog::where('call_id', $request->input('call_id'))->update([
            'status' => $request->input('status'),
            'duration' => $request->input('duration'),
        ]);

        return response('OK');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
