<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\Tasks;

use App\Http\Requests\V1\Tasks\StoreRequest;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class StoreController
{
    public function __invoke(StoreRequest $request, TaskService $taskService): JsonResponse
    {
        $taskService->create($request->validated(), auth()->user());

        return response()->json(
            data: [
                'message' => 'Task created successfully.',
            ],
            status: JsonResponse::HTTP_CREATED,
        );
    }
}
