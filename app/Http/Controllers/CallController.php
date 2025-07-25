<?php
namespace App\Http\Controllers;

use App\Models\backend\AdminEnquireModel;
use App\Services\TwilioCallService;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function callEnquiry($id, TwilioCallService $twilio)
    {
        $enquiry = AdminEnquireModel::findOrFail($id);

        // Make sure phone number is in international format like +971XXXXXXXXX
        $twilio->makeCall($enquiry->phone);

        return back()->with('success', 'Calling ' . $enquiry->phone);
    }



     public function call()
    {
        $enquiry = AdminEnquireModel::all();

        
    

        return view("call.cal", compact('enquiry'));
    }
}



