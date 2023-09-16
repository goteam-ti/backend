<?php

declare(strict_types=1);

use App\Http\Controllers\V1\Tasks\DestroyController;
use App\Http\Controllers\V1\Tasks\IndexController;
use App\Http\Controllers\V1\Tasks\ShowController;
use App\Http\Controllers\V1\Tasks\StoreController;
use App\Http\Controllers\V1\Tasks\UpdateController;
use Illuminate\Support\Facades\Route;

Route::get('/', IndexController::class)->name('index');
Route::post('/', StoreController::class)->name('store');
Route::get('/{ulid}', ShowController::class)->name('show');
Route::put('{ulid}', UpdateController::class)->name('update');
Route::delete('{ulid}', DestroyController::class)->name('destroy');
