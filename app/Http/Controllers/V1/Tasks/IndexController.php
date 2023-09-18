<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Resources\V1\TaskResource;
use App\Services\TaskService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController
{
    public function __invoke(Request $request, TaskService $taskService): JsonResponse
    {
        // set query
        $query = $taskService->getByUserId(auth()->id(), $request);

        // we can also use pagination(), instead of get(), but for now we will use get()
        $resource = TaskResource::collection($query->get());

        // cache resource
        $resource = Cache::remember($taskService->getCacheKey($request), $taskService->getCacheDuration(), function () use ($resource) {
            return $resource;
        });

        // we can create a custom resource also, but for now we will use JsonResponse
        return new JsonResponse($resource, JsonResponse::HTTP_OK);
    }
}
