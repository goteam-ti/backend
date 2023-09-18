<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Resources\V1\TaskResource;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

/**
 * We can use this service to get, create, update, delete, and other task related actions.
 * Following the single responsibility principle, this service should only be responsible for
 * task related actions.
 *
 * We can use this service in our controllers, jobs, and other services.
 *
 * Note: for caching, we can use observer or listeners, but I prefer to use service for custom caching in the future,
 * Caching can be improve later on.
 *
 * We can extract this in the future if gets bloated.
 */
class TaskService
{
    private string $cacheKey;
    private int $cacheDuration;

    public function __construct(
        ?string $cacheKey = null,
        ?int $cacheDuration = null
    ) {
        $this->cacheKey = $cacheKey ?? 'tasks_'.auth()->id();
        $this->cacheDuration = $cacheDuration ?? 60 * 60 * 24; // 1 day
    }

    public function find(string $ulid): Task
    {
        // we can add complex throwables here in the future
        return Task::where('id', $ulid)->firstOrFail();
    }

    public function getTasksByUserId(Request $request, $userId)
    {
        $query = Task::query()
                ->where('user_id', $userId)
                ->orderBy('created_at', 'desc');

        if ($request->has('search')) {
            $this->clearCache();
            $query->where('title', 'ilike', "%{$request->search}%");
            // we can also search by description we just need to add orWhere
        }

        // we can add pagination here in the future

        $resource = TaskResource::collection($query->get());

        return Cache::remember($this->getCacheKey($request), $this->getCacheDuration(), function () use ($resource) {
            return $resource;
        });
    }

    public function create(array $data, User $user): Task
    {
        $query = \DB::transaction(function () use ($data, $user) {
            $task = new Task($data);
            $task->user()->associate($user);
            $task->save();

            return $task;
        });

        $this->clearCache();

        return $query;
    }

    public function update(array $data, Task $task): Task
    {
        $task->update($data);

        $this->clearCache();

        return $task;
    }

    public function delete(Task $task): void
    {
        $task->delete();

        $this->clearCache();
    }

    public function clearCache(): void
    {
        // we can cache using prefix tags and clear all cache with that prefix,
        // for now we can just clear all cache
        Cache::flush();
    }

    public function getCacheKey(?Request $request = null): string
    {
        if ($request === null) {
            // Handle the case where $request is not provided
            return $this->cacheKey;
        }

        return $this->cacheKey . '_' . md5($request->fullUrl());
    }

    public function getCacheDuration(): int
    {
        return $this->cacheDuration;
    }
}
