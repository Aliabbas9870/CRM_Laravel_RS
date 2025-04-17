<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminEnquireModel;
use Illuminate\Http\Request;
use App\Models\User;


class AdminLeadsController extends Controller
{
    // Display the list of all leads
    public function index()
    {

        $enquiry = AdminEnquireModel ::all();

        // echo "<pre>";
        // print_r($enquiry);
        // echo "</pre>";
        // die;
        // Fetch all enquiries
        $users = User::all(); // Fetch all users to assign tasks
        return view('backend.leadList', compact('enquiry', 'users'));
        // return view('backend.leadList', ['enquiry' => AdminEnquireModel::all()]);
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


    // Assign a task to a user by email and link with enquiry
//   public function assignTask(Request $request, $id)
//     {

//     // info('Assigning task', ['id' => $id, 'email' => $request->email, 'task_name' => $request->task_name]);
//         $request->validate([
//             'email' => 'required|email|exists:users,email',

//         ]);

//         $enquiry = AdminEnquireModel::findOrFail($id);

//         // Update the enquiry to assign the task
//         $enquiry->update([
//             'email' => $request->email, // Assuming this column exists

//             'status' => 'pending', // Set status to pending or whatever is appropriate
//         ]);

//         return back()->with('success', 'Task assigned successfully.');
//     }


    // Remove the specified lead from storage
    public function DeleteRecordLead($id)
    {
        AdminEnquireModel::destroy($id);
        return back()->with('success', 'Lead deleted successfully.');
    }




    // public function editFAQ($id)
    // {
    //     // dd($id);
    //     $faqs = FAQs::where('id', $id)->first();
    //     return view('backend.faqedit', ['faqs' => $faqs]);
    // }

    // public function updateFAQ(Request $request, $id)
    // {

    //     $request->validate(
    //         [
    //             'question' => 'required',
    //             'answer' => 'required'
    //         ]
    //         );

    //     $faqs = FAQs::where('id', $id)->first();
    //     $FAQ_STATUS = 1;

    //     $faqs->question = $request->question;
    //     $faqs->answer = $request->answer;
    //     $faqs->status = $FAQ_STATUS;
    //     $faqs->save();
    //     return back()->withSuccess('Member Record Updated Successfully');
    // }



}
