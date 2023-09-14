<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('auth:')->group(
    base_path('routes/v1/auth.php'),
);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {

        return new JsonResource($request->user());

    })->name('user');
});
