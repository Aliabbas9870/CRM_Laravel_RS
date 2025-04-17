<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\backend\AdminEnquireModel;
use App\Models\backend\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

    public function DeleteUser($id)
    {
        User::destroy($id);
        return back()->with('success', 'User deleted successfully.');
    }


    public function EditUser($id)
{

    // $projects = Projects;
    $users = User::where('id', $id)->first();
    return view('backend.editUser', ['users' => $users]);
}

public function UpdateUser(Request $request,$id)
{

    $validator = Validator::make($request  ->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:4',
    ]);

    $users = User::where('id', $id)->first();

    if (!$users) {
        return back()->withErrors(provider: 'user not found.');
    }


    // $PROJECT_STATUS = 1;

    $users->name = $request->name;
    $users->email = $request->email;
    $users->password = $request->password;
    // $users->status = $PROJECT_STATUS;
    $users->save();
    return redirect('/admin')->with('success', 'users updated successfully.');




}

    public function  teamList(){
        $users=User::all();
        return view("backend.userList",compact("users"));
        }
    public function showRegister(){
        return view("backend.register");
        }



    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, //
        ]);

        return redirect()->back()->with('success', 'User registered successfully.');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $user = User::where('email', $request->email)->first();


    //     $userId = auth()->id(); // Using authenticated user's ID
    //     $tasks = Task ::where('user_id', $userId)->get();
    //     if ($user && $request->password=== $user->password){
    //         Auth::login($user);
    //         return redirect("/user");
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials are incorrect.',
    //     ]);
    // }




    public function userTasks()
    {
        if (!Auth::check()) {
            return redirect('/user/login')->withErrors(['login' => 'Please login to continue.']);
        }


        // Retrieve the logged-in user's email
        $userEmail = Auth::user()->email;

        // Fetch enquiries assigned to the logged-in user by email
        $tasks = AdminEnquireModel::where('email', $userEmail)
            ->whereIn('status', ['pending', 'active', 'complete'])
            ->get();

        return view('frontend.index', compact('tasks'));
    }




     // Show the login form
     public function showLoginForm()
     {
         if (Auth::check()) {
             return redirect("/user");
         }
         return view('frontend.userLogin');
     }

         // Handle user logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login')->with('success', 'You have been logged out.');
    }



    public function markAsComplete($id)
{
    $task = Task::findOrFail($id);
    $task->status = 'complete';
    $task->save();

    return back()->with('success', 'Task marked as complete.');
}

public function delete($id)
{
    $task = AdminEnquireModel::findOrFail($id);
    $task->delete();

    return back()->with('success', 'Task deleted successfully.');
}





public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && $request->password===$user->password) { // Securely check password
        Auth::login($user);
        return redirect("/user")->with('userName', $user->name); // Pass user name to the session
    }


    return back()->withErrors([
        'email' => 'The provided credentials are incorrect.',
    ]);
}


    public function index()
    {
        if (!Auth::check()) {
            return redirect('/user/login')->withErrors(['login' => 'Please login to continue.']);
        }

        $user = Auth::user(); // Get the authenticated user
        $userEmail = $user->email;
        // $userName = $user->name; // Assign the user name to pass to the view\


        // Fetch tasks associated with the user's email
        $tasks = AdminEnquireModel::where('email', $userEmail)->get();

        // Pass both tasks and user name to the view
        return view('frontend.index', compact('tasks', 'userName'));
    }


}
