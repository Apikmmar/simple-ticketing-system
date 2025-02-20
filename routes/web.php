<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/ticket', [TicketController::class, 'viewTicket'])->name('ticket.view');
    Route::post('/new_ticket', [TicketController::class, 'getTicketNumber'])->name('ticket.add');
    Route::patch('/next_ticket', [TicketController::class, 'updateTicketNumber'])->name('ticket.update');
});

require __DIR__.'/auth.php';
