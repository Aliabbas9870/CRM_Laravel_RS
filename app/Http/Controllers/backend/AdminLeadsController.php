<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminEnquireModel;
use Illuminate\Http\Request;
use App\Models\User;


class AdminLeadsController extends Controller
{



    public function index(Request $request)
{
    // Get the sorting order from the URL query parameter (default to 'desc')
    $sortOrder = $request->get('sort', 'desc');

    // Fetch the enquiries with sorting by created_at field
    $enquiry = AdminEnquireModel::orderBy('created_at', $sortOrder)->get();

    // Fetch all users to assign tasks
    $users = User::all();

    // Return the view with enquiries and users
    return view('backend.leadList', compact('enquiry', 'users'));
}

public function create(Request $request)
{
    $data = $request->query(); // This ensures you get only the query parameters (not files or post body)

    $users = User::all(); // Fetch all assignable users

    return view('backend.createTask', compact('data', 'users'));
}

public function updateStatus(Request $request, $id)
{
    // Validate the status input
    $request->validate([
        'status' => 'required|in:0,1,2',  // Ensure the status is one of these values
    ]);

    // Find the enquiry by ID
    $enquiry =AdminEnquireModel::findOrFail($id);

    // Update the status
    $enquiry->status = $request->input('status');
    $enquiry->save();

    // Return a response or redirect
    return redirect()->back()->with('success', 'Status updated successfully.');
}

    public function assignTask(Request $request)
    {
        // Validate that both email and id are provided
        $request->validate([
            'email' => 'required|email|exists:users,email', // Validate email exists in users table
            'id' => 'required|exists:enquiries,id', // Validate id exists in enquiries table
        ]);

        // Find the user by their email
        $user = User::where('email', $request->email)->firstOrFail();

        // Find the enquiry using 'id'
        $enquiry = AdminEnquireModel::findOrFail($request->id);

        // Assign task to user based on email and set the status to pending
        $enquiry->email = $user->email; // Assign user email to enquiry
        $enquiry->status = 'pending'; // Set status to pending
        $enquiry->save();

        return redirect()->route('admin.leadList')->with('success', 'Task assigned successfully to ' . $user->email);
    }



    // Show the form for adding a new lead
    public function addLeads()
    {
        return view('backend.addLeads');
    }

    // Store a newly created lead in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:enquiries,email',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'prefer_contact_type' => 'nullable|string|max:50',
            'note' => 'nullable|string',
            'from' => 'nullable|string|max:100',
            'url' => 'nullable|',
            'status' => 'nullable|integer',
        ]);

        AdminEnquireModel::create($request->except('_token'));

        return redirect('/admin')->with('success', 'Lead added successfully.');
    }

    // Show the form for editing the specified lead


    public function EditRecordLead($id)
{

    // $projects = Projects;
    $lead = AdminEnquireModel::where('id', $id)->first();
    return view('backend.editLeads', ['lead' => $lead]);
}

public function UpdateRecordLead(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:enquiries,email,' . $id,
        'phone' => 'required|string|max:20',
        'country' => 'required|string|max:100',
        'prefer_contact_type' => 'nullable|string|max:50',
        'note' => 'nullable|string',
        'from' => 'nullable|string|max:100',
        // 'url' => 'nullable|url',
        'status' => 'nullable|integer',
    ]);

    $lead = AdminEnquireModel::where('id', $id)->first();

    if (!$lead) {
        return back()->withErrors('Lead not found.');
    }

    $PROJECT_STATUS = 1;

    $lead->name = $request->name;
    $lead->email = $request->email;
    $lead->phone = $request->phone;
    $lead->country = $request->country;
    $lead->prefer_contact_type = $request->prefer_contact_type ?? $lead->prefer_contact_type;
    $lead->note = $request->note ?? $lead->note;
    $lead->from = $request->from ?? 'default_value'; // Replace 'default_value' as needed
    // $lead->url = $request->url ?? $lead->url;
    $lead->status = $PROJECT_STATUS;

    $lead->save();

    return redirect('/admin')->with('success', 'Lead updated successfully.');
}




    // Remove the specified lead from storage
    public function DeleteRecordLead($id)
    {
        AdminEnquireModel::destroy($id);
        return back()->with('success', 'Lead deleted successfully.');
    }





}
