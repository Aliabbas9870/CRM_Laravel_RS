<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\backend\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{



public function addComment(Request $request, $id)
{
    $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    $task = Task::findOrFail($id);

    $dateTimeNow = now()->format('d/m/Y h:i A'); // e.g., 10/06/2025 02:15 PM
    $newComment = $request->comment . ' - ' . $dateTimeNow;

    if (!empty($task->comment)) {
        $task->comment .= "\n" . $newComment;
    } else {
        $task->comment = $newComment;
    }

    $task->save();

    return redirect()->back()->with('success', 'Comment added successfully!');
}


    // public function addComment(Request $request, $id)
    // {
    //     $request->validate([
    //         'comment' => 'required|string|max:500',
    //     ]);

    //     // Find the task
    //     $task = Task::find($id);

    //     if ($task->comment) {

    //         $task->comment .= "\n\n" . $request->comment;
    //     } else {

    //         $task->comment = $request->comment;
    //     }

    //     $task->save();

    //     return redirect()->back()->with('success', 'Comment added successfully!');
    // }


    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Mail::send([], [], function ( $message) use ($request) {
            $message->to($request->email)
                    ->subject($request->subject)
                    ->html($request->body); // Use 'html()' for HTML body or 'text()' for plain text
        });

        return redirect()->back()->with('success', 'Email sent successfully!');
    }

    // public function create()
    // {
    //     $users = User::all();
    //     return view('backend.createTask', compact('users'));
    // }
    public function create(Request $request)
    {
        $users = User::all();
        $data = $request->query(); // Gets ?name=...&email=... from URL
        return view('backend.createTask', compact('users', 'data'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
            'phone' => 'nullable|string',
            'note' => 'nullable|string',
            'name' => 'nullable|string',
            'url' => 'nullable|string',
            'prefer_contact_type' => 'nullable|string',

            'country' => 'nullable|string',
            'language' => 'nullable|string',
        ]);

        Task::create($request->all());
        return redirect()->route('admin.index')->with('success', 'Task created successfully');
    }

    public function TasksListAdmin()
    {
        $tasks = Task::all(); // Fetch all tasks from the database
        return view('backend.taskList', compact('tasks'));
    }



    public function userTasks()
    {
        $userId = auth()->id();

        // Get tasks assigned to the logged-in user
        $tasks = Task::where('user_id', $userId)->get();

        // Calculate the counts specifically for the assigned tasks
        $totalTasksCount = $tasks->count();
        $completedTasksCount = $tasks->where('is_completed', true)->count();
        $incompleteTasksCount = $tasks->where('is_completed', false)->count();

        return view('frontend.index', compact('tasks', 'totalTasksCount', 'completedTasksCount', 'incompleteTasksCount'));
    }



    public function ListTasks()
    {
        $userId = auth()->id();

        // Get tasks assigned to the logged-in user
        $tasks = Task::where('user_id', $userId)->get();


        $completedTasksCount = $tasks->where('is_completed', true)->count();
        $incompleteTasksCount = $tasks->where('is_completed', false)->count();

        return view('frontend.taskList', compact('tasks',

          'completedTasksCount',
          'incompleteTasksCount'
        ));
    }



    public function markComplete($id)
{
    $task = Task::findOrFail($id);
    $task->is_completed = true;
    $task->save();

    return redirect()->back()->with('success', 'Task marked as complete!');
}



    // Remove the specified lead from storage
    public function DeleteTask($id)
    {
        Task::destroy($id);
        return back()->with('success', 'Task deleted successfully.');
    }


    public function edit($id)
{
    $task = Task::findOrFail($id);
    // print_r($task);
    // die;
    $users = User::all(); // For assigning task
    return view('backend.editTask', compact('task', 'users'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string',
        'name' => 'required|string',
        'email' => 'required|email',
        'phone' => 'nullable|string',
        'language' => 'nullable|string',
        'comment' => 'nullable|string',
        'user_id' => 'nullable|exists:users,id',
        'is_completed' => 'nullable|boolean',
    ]);

    $task = Task::findOrFail($id);
    $task->update($request->all());

    return redirect()->route('admin.index')->with('success', 'Task updated successfully.');
}

}
