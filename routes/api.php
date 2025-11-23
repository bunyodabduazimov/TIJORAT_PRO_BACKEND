<?php

use Illuminate\Support\Facades\Route;

// Версия 1
Route::prefix('v1')
    ->name('api.v1.')
    ->group(function () {
        require __DIR__ . '/api_v1.php';
    });

// Версия 2 
Route::prefix('v2')
    ->name('api.v2.')
    ->group(function () {
        if (file_exists(__DIR__ . '/api_v2.php')) {
            require __DIR__ . '/api_v2.php';
        }
    });
