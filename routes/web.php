<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\AdminLeadsController;
use App\Http\Controllers\backend\MailController;
use App\Http\Controllers\backend\TaskController;
use App\Http\Controllers\frontend\UserController;
use App\Http\Controllers\Frontend\UserMailController;
use App\Http\Controllers\frontend\WhatsAppController;
use App\Http\Controllers\TwilioController;
use Illuminate\Support\Facades\Route;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect root URL to user login page
Route::get('/', function () {
    return redirect()->route('user.login');
});

// User routes
Route::get('/user/login', [UserController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserController::class, 'login']);
Route::get('/user/logout', [UserController::class, 'logout'])->name('user.logout'); // User logout route
Route::get('/user', [UserController::class, 'index'])->name('user.index');




//
//  tasks
//
// Route to mark task as complete


// Admin routes
Route::get('/admin/login', [AdminController  ::class, 'showLoginForm'])->name('admin.login');

// Route::get('/admin/login', function(){
//     if(session()->has('email')){
//         return redirect('/Home');
//     } else {
//         return view('backend.adminLogin');
//     }
// });


// Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/login', function () {
    if (session()->has('email')) {
        return redirect('/admin');
    } else {
        return view('backend.adminLogin');
    }

});

Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout'); // Admin logout route
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

// User registration routes
Route::get('/register/user', [UserController::class, 'showRegister'])->name('user.register');
Route::post('/register/user', [UserController::class, 'register']);
Route::get('/TeamList', [UserController::class, 'teamList']);

// user
Route::Put('/EditUser/{id}', [UserController::class, 'UpdateUser'])->name('users.disable');
Route::get('/EditUser/{id}', [UserController::class, 'EditUser'])->name('users.enable');
Route::delete('/DeleteUser/{id}', [UserController::class, 'DeleteUser'])->name('users.delete');
// Task routes
// Route for assigning tasks to users with a named route
Route::post('/admin/enquiries/assign', [AdminLeadsController::class, 'assignTask'])->name('admin.enquiries.assign');

// Leads management routes
Route::get('/LeadList', [AdminLeadsController::class, 'index'])->name("admin.leadList");
Route::get('/AddLeads', [AdminLeadsController::class, 'addLeads'])->name('admin.addLeads');
Route::post('/AddLeads', [AdminLeadsController::class, 'store'])->name('admin.store');
Route::delete('/DeleteRecordLead/{id}', [AdminLeadsController::class, 'DeleteRecordLead']);
Route::Put('/EditRecordLead/{id}', [AdminLeadsController::class, 'updateRecordLead']);
Route::get('/EditRecordLead/{id}', [AdminLeadsController::class, 'EditRecordLead']);
Route::put('/enquiries/{id}/update-status', [ AdminLeadsController  ::class, 'updateStatus'])->name('enquiries.updateStatus');

// Task mangment of admin

Route::get('/admin/tasks/create', [TaskController::class, 'create'])->name('admin.tasks.create');
Route::get('/admin/task', [TaskController::class, 'TasksListAdmin'])->name('admin.tasks.list');

Route::post('/admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');

// user task
Route::get('/taskList', [TaskController::class, 'ListTasks'])->name('user.taskList');
Route::get('/user', [TaskController::class, 'userTasks'])->name('user.tasks');
Route::post('task/{id}/complete', [TaskController::class, 'markComplete'])->name('task.complete');
Route::post('/tasks/{id}/comment', [TaskController::class, 'addComment'])->name('task.addComment');
Route::get('/task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/update/{id}', [TaskController::class, 'update'])->name('task.update');

Route::Delete('/tasks/{id}', [TaskController::class, 'DeleteTask'])->name('task.delete');


// call system

Route::get('/SMS', [TwilioController  ::class, 'Sms']);
Route::Post('/SMS', [TwilioController  ::class, 'SendSMS']);
Route::post('/Call', [TwilioController::class, 'MakeCall']);

Route::get('/send-email-form', [MailController::class, 'sendEmailForm'])->name('send-email-form');
// Route to handle form submission (POST request)
Route::post('/send-email-form', [MailController::class, 'sendEmailForm']);
// Route to handle sending custom emails (POST request)
Route::post('/send-custom-email', [MailController::class, 'sendCustomEmail'])->name("send.custom.email");

// team email clients
// Display the email composition form
Route::get('/user/compose-email', [UserMailController::class, 'showEmailForm'])->name('user.compose.email');
// Handle the email submission
Route::post('/user/send-email', [UserMailController::class, 'sendUserEmail'])->name('user.send.email');
// admin contact with team
Route::get('/admin/compose-email', [UserMailController::class, 'showEmailFormAd'])->name('admin.compose.email');
// Handle the email submission
Route::post('/admin/send-email', [UserMailController::class, 'sendUserEmail'])->name('admin.send.email');



// Route to show the form
Route::get('/send-message', function () {
    return view('frontend.whatsappMessage');
});

// Route to handle form submission
Route::post('/send-message', [WhatsAppController::class, 'sendMessage'])->name('sendMessage');
Route::get('/send-whatsapp/{number}', [WhatsAppController::class, 'sendMessageFromLink'])->name('send.whatsapp');




// test form

use App\Http\Controllers\FormController;

Route::get('/form', [FormController::class, 'showForm']);
Route::post('/submit-form', [FormController::class, 'submitForm'])->name('form.submit');

