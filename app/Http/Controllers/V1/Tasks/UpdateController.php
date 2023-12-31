<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Requests\V1\Tasks\UpdateTaskRequest;
use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;

class UpdateController
{
    public function __invoke(UpdateTaskRequest $request, string $ulid, TaskService $taskService): TaskResource
    {
        // find task
        $task = $taskService->find($ulid);

        // set query
        $query = $taskService->update($request->validated(), $task);

        // create resource
        return new TaskResource($query);
    }
}
