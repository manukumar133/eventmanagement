<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiEventController;
Route::get('/events', [ApiEventController::class, 'index']);
