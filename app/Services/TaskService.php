<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use App\Models\User;

/**
 * We can use this service to get, create, update, delete, and other task related actions.
 * Following the single responsibility principle, this service should only be responsible for
 * task related actions.
 *
 * We can use this service in our controllers, jobs, and other services.
 *
 * We can extract this in the future if gets bloated.
 */
class TaskService
{
    public function find(string $ulid): Task
    {
        return Task::where('id', $ulid)->firstOrFail();
    }

    public function get(object $request)
    {
        $query = Task::query()
                ->where('user_id', $request->user()->id)
                ->when($request->has('search'), function ($query) use ($request) {
                    $query->where('title', 'like', "%{$request->search}%")
                          ->orWhere('description', 'like', "%{$request->search}%");
                })
                ->latest();

        return $query;
    }

    public function create(array $attributes, User $user): Task
    {
        $task = new Task($attributes);
        $task->user()->associate($user);
        $task->save();

        return $task;
    }

    public function update(Task $task, array $attributes): Task
    {
        $task->update($attributes);

        return $task;
    }

    public function delete(Task $task): void
    {
        $task->delete();
    }
}
