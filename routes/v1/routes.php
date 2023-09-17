<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // we can move this to a UserController if we want
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('user');
});

Route::prefix('auth')->as('auth:')->group(
    base_path('routes/v1/auth.php'),
);

Route::middleware(['auth:sanctum'])->prefix('tasks')->as('tasks')->group(
    base_path('routes/v1/tasks.php'),
);
