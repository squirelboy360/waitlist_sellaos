<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WaitlistController;

Route::get('/', [WaitlistController::class, 'index']);
Route::post('/waitlist', [WaitlistController::class, 'store']);
Route::get('/waitlists', [WaitlistController::class, 'showAll']);
Route::put('/waitlist/{id}', [WaitlistController::class, 'update']);
Route::delete('/waitlist/{id}', [WaitlistController::class, 'destroy']);
