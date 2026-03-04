<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TicketChatController;
use App\Http\Controllers\TicketController;
use App\Models\App;
use Illuminate\Support\Facades\Route;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Test route untuk view tertentu
Route::get('/test', function () {
    return view('dashboard0');
});

// View
Route::middleware(['auth'])->group(function () {
    //
    
    // -- Dashboard --
    Route::get('/', [DashboardController::class, 'techDashboard'])->name('dashboard');

    // -- Ticket List --
    Route::get('/tickets', function () {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    })->name('tickets.index');

    // -- Create Ticket --
    Route::get('/tickets/create', function(){
        $users = User::all();
        $apps = App::all();
        return view('tickets.create-ticket', compact('users', 'apps'));
    })->name('tickets.create');

    // -- Show Ticket --
    Route::get('/tickets/{ticket}', function(Ticket $ticket){
        $ticket->load(['app', 'requester', 'tester', 'priority', 'severity', 'status']);

        return view('tickets.show', compact('ticket'));
    })->name('tickets.show');

    // -- Show App --
    Route::get('/apps', function(){
        $apps = App::with('users')->get();
        return view('apps.index', compact('apps'));
    })->name('apps.index');

    // -- Attachement --
    Route::get('/tickets/{ticket}/attachments/{attachment}', [TicketChatController::class, 'download'])->name('tickets.attachments.download');

    // -- User Profile --
    Route::get('/profile/{tab?}', [ProfileController::class, 'index'])->name('profile.index');

    // -- Schedule --
    Route::get('/schedules', function(){
        $apps = App::all();
        $users = User::all();
        $tickets = Ticket::all();
        return view('schedules.index', compact('apps', 'users', 'tickets'));
    })->name('schedules.index');
});

// API
Route::middleware(['auth'])->group(function(){
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::post('/ticket/{ticket}/reply', [TicketChatController::class, 'store'])->name('tickets.reply.store');
    Route::post('/tickets/{ticket}/resolve', [TicketController::class, 'markAsResolved'])->name('tickets.resolve');
    Route::put('/profile/personal-info', [ProfileController::class, 'updatePersonalInfo'])->name('profile.update.personal');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update.password');
    Route::post('/schedules/store', [ScheduleController::class, 'store'])->name('schedules.store');
    Route::put('/schedules/update/{id}', [ScheduleController::class, 'update'])->name('schedules.update');
    Route::get('/schedules/events', [ScheduleController::class, 'getEvents'])->name('schedules.events');
});

require __DIR__.'/auth.php';
