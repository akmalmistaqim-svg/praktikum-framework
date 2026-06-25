<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HarvestController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('harvests', HarvestController::class);
});