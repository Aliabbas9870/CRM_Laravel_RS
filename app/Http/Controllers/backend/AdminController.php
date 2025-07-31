<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
use App\Models\backend\Admin;
use App\Models\backend\AdminEnquireModel;
use App\Models\backend\Task;
use App\Models\User;

class AdminController extends Controller
{
    // Show the admin login form


    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('admin.index'); // Redirect to user dashboard if already logged in
        }
        return view('backend.adminLogin'); // Return the admin login view
    }

public function showDetails($id)
{
    $task = Task::with('user')->findOrFail($id); // Load user relationship if needed

    return view('backend.viewTaskDetails', compact('task'));
}


  public function howDetails()
    {

        return view('backend.viewTaskDetails'); // Return the admin login view
    }
    // Handle admin login
    public function login(Request $request)
    {


        $admin = Admin ::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
        if($admin){
            session()->put('id', $admin->id);
            session()->put('name', $admin->name);
            session()->put('email', $admin->email);
            return redirect('/admin')->with('success', 'Login Success');

        } else {
            return redirect('admin/login')->with('error', 'Invalid Credentials.');
        }
        // Validate incoming request

        // Attempt to authenticate the admin using the credentials


        // Authentication failed, redirect back with error

    }

    public function logout()
    {
        session()->forget('id');
        session()->forget('name');

        session()->forget('email');
        Auth::logout(); // Log the admin out
        return redirect('/admin/login')->with('success', 'You have been logged out.'); // Redirect to the login page with a success message
    }

    // Display admin dashboard
 public function index(Request $request)
{
    // Default sort order from URL query
    $sortOrder = $request->get('sort', 'desc');

    // Check if user is logged in via session
    if (!session()->has('email')) {
        return view('backend.adminLogin');
    }

    // Get session values
    $Name = session('name') . " " . session('email');

    // Fetch all users and tasks
    $users = User::all();
    $tasks = Task::orderBy('created_at', 'desc')->get();

    // Count stats
    $TotalAdminModel = Admin::count();
    $TotalTeamMember = $users->count();
    $taskTotal = $tasks->count();
    $completedTasksCount = $tasks->where('is_completed', true)->count();
    $incompleteTasksCount = $tasks->where('is_completed', false)->count();

    // Fetch enquiries and filter unique ones based on email + phone
    $allEnquiries = AdminEnquireModel::orderBy('created_at', $sortOrder)->get();

    $uniqueKeys = [];
    $uniqueEnquiries = $allEnquiries->filter(function ($item) use (&$uniqueKeys) {
        $email = strtolower(trim($item->email));
        $phone = preg_replace('/\D+/', '', $item->phone);
        $key = $email . '-' . $phone;

        if (in_array($key, $uniqueKeys)) {
            return false;
        }

        $uniqueKeys[] = $key;
        return true;
    });

    $TotalEnqury = $uniqueEnquiries->count();

$users = \App\Models\User::all(); // ✅ all users for dropdown


    return view('backend.index', [
        'enquiryall' => $allEnquiries, // original list (with possible duplicates)
        'enquirys' => $uniqueEnquiries, // filtered unique list
        'TotalEnqury' => $TotalEnqury,
        'users' => $users,
        'TotalTeamMember' => $TotalTeamMember,
        'TotalAdminModel' => $TotalAdminModel,
        'tasks' => $tasks,

        'taskTotal' => $taskTotal,
        'completedTasksCount' => $completedTasksCount,
        'incompleteTasksCount' => $incompleteTasksCount
    ]);
}



}
