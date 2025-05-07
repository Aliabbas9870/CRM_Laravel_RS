<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserFormSubmitted;

class FormController extends Controller
{
    //
    public function showForm()
    {
        return view('form');
    }

    public function submitForm(Request $request)
    {
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];
Mail::to($request->email)->send(new UserFormSubmitted($details));


        return back()->with('success', 'Email has been sent to your email address.');
    }
}
