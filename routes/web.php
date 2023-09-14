<?php

declare(strict_types=1);

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return new JsonResource([
        'message' => 'This api is developed for Technical Interview provided by the GoTeam.',
        'documentation' => 'https://github.com/goteam-ti/backend',
    ]);
});
