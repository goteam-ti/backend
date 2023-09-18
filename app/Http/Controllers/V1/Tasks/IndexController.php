<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(Request $request, TaskService $taskService)
    {
        // set query
        $query = $taskService->getTasksByUserId($request, auth()->id());

        $resource = TaskResource::collection($query);

        return $resource;
    }
}
