<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;

class ShowController
{
    public function __invoke(string $ulid, TaskService $taskService): TaskResource
    {
        // set query
        $query = $taskService->find($ulid);

        // set resource
        return new TaskResource($query);
    }
}
