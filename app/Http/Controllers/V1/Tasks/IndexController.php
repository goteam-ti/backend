<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;
use Cache;
use Illuminate\Http\Request;

class IndexController
{
    public function __invoke(Request $request, TaskService $taskService)
    {
        // set query
        $query = $taskService->getTasksByUserId(auth()->id(), $request);

        // we also can use pagination
        // $query = $query->paginate();

        // set resource
        $resource = TaskResource::collection($query->get());

        $resource = Cache::remember($taskService->getCacheKey($request), $taskService->getCacheDuration(), function () use ($resource) {
            return $resource;
        });

        return $resource;
    }
}
