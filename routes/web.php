<?php

use App\Models\App;
use Illuminate\Support\Facades\Route;

use App\Models\Ticket;
use App\Models\User;

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

Route::middleware(['auth'])->group(function () {
    //
    
    // -- Dashboard --
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

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
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
