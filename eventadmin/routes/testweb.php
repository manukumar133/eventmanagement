<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth; // Add this for Auth routes

// Redirect the root URL to the events index page
Route::get('/', function () {
  return redirect()->route('events.index');
});

// Authentication routes (Login, Register, Logout)
Auth::routes(); // Ensure this is included

// Web routes for event management
Route::resource('events', EventController::class);

// API Route for fetching events
Route::middleware('api')->get('/api/events', [EventController::class, 'apiIndex']);

// Registration routes
Route::get('/register', [RegistrationController::class, 'create'])->name('registrations.create');
Route::post('/register', [RegistrationController::class, 'store'])->name('registrations.store');

// Admin Routes (Protected)
Route::middleware(['auth'])->group(function () {
  Route::get('/admin/registrations', [RegistrationController::class, 'index'])->name('registrations.index');
});