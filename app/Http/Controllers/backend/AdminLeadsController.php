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
        $sortOrder = $request->get('sort', 'desc');
        $allEnquiries = AdminEnquireModel::orderBy('created_at', $sortOrder)->get();
       // Filter out dupli cates by normalized email + phone
        $unique = [];
        $filtered = $allEnquiries->filter(function ($item) use (&$unique) {
            $email = strtolower(trim($item->email));
            $phone = preg_replace('/\D+/', '', $item->phone);
            $key = $email . '-' . $phone;

            if (in_array($key, $unique)) {
                return false;
            }
            $unique[] = $key;
            return true;
        });
        $users = User::all();
        return view('backend.leadList', [
            'enquiry' => $filtered,
            'users' => $users,
        ]);
    }
public function create(Request $request)
{
    $data = $request->query();
    $users = User::all();

    return view('backend.createTask', compact('data', 'users'));
}
public function updateStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:0,1,2',
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
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'id' => 'required|exists:enquiries,id',
        ]);
        $user = User::where('email', $request->email)->firstOrFail();
        $enquiry = AdminEnquireModel::findOrFail($request->id);
        $enquiry->email = $user->email; // Assign user email to enquiry
        $enquiry->status = 'pending'; // Set status to pending
        $enquiry->save();
        return redirect()->back()->with('success', 'Task assigned successfully to ' . $user->email);
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
            'email' => 'required|email',
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



public function updateNote(Request $request)
{
    if (!$request->ajax()) {
        return response()->json(['error' => 'Invalid request'], 400);
    }

    $enquiry = AdminEnquireModel::find($request->id);

    if (!$enquiry) {
        return response()->json(['error' => 'Enquiry not found'], 404);
    }

    $enquiry->note = $request->note;
    // $enquiry->updated_by = auth()->user()->id ?? null;
    $enquiry->save();

    return response()->json(['success' => true]);
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
