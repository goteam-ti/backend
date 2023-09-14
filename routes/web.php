<?php

declare(strict_types=1);

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return new JsonResource([
        'data' => [
            'message' => 'This api is developed for Technical Interview provided by the GoTeam.',
        ],
        'status' => 200,
    ]);
});

require __DIR__.'/auth.php';
