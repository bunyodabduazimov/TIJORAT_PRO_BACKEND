<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\AuthController;
// SPA аутентификация через сессии Laravel Sanctum
Route::post('/login', [AuthController::class, 'login']);   // SPA логин
Route::post('/logout', [AuthController::class, 'logout']); // SPA logout
