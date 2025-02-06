<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ApiEventController;

// Redirect root URL to /events
Route::get('/', function () {
    return redirect('/events');
});

// Authentication Routes
Auth::routes();

// ✅ Registrations Routes (Accessible without login)
Route::get('/register/create', [RegistrationController::class, 'create'])->name('registrations.create');

Route::post('/registrations/store', [RegistrationController::class, 'store'])->name('registrations.store');

// ✅ Grouped Routes for Authenticated Users
Route::middleware(['auth'])->group(function () {
    // Event Management Routes
    Route::resource('events', EventController::class);

    // Registrations Management (Only for Admins or Logged-in Users)
    Route::get('/admin/registrations', [RegistrationController::class, 'index'])->name('registrations.index');

    // Logout Route - Redirect to login page after logout
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login'); // Redirect to login page
    })->name('logout');
});

// Redirect users to /events after login
Route::get('/home', function () {
    return redirect('/events');
})->middleware('auth')->name('home');


// ✅ API Routes Inside Web.php
Route::prefix('api')->group(function () {
    Route::get('/events', [ApiEventController::class, 'index']);
    Route::post('/events', [ApiEventController::class, 'store']);
    Route::get('/events/{id}', [ApiEventController::class, 'show']);
    Route::put('/events/{id}', [ApiEventController::class, 'update']);
    Route::delete('/events/{id}', [ApiEventController::class, 'destroy']);
});
