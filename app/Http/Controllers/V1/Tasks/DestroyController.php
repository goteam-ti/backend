<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;

class DestroyController
{
    public function __invoke(string $ulid, TaskService $taskService): TaskResource
    {
        // find task
        $task = $taskService->find($ulid);

        // delete task
        $taskService->delete($task);

        return new TaskResource($task);
    }
}
