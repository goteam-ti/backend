<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Requests\V1\Tasks\StoreRequest;
use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;

class StoreController
{
    public function __invoke(StoreRequest $request, TaskService $taskService): TaskResource
    {
        $query = $taskService->create($request->validated(), auth()->user());

        return new TaskResource($query);
    }
}
