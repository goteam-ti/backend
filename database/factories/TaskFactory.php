<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['incomplete', 'complete']),
            'user_id' => User::factory(),
            'due_date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d H:i:s'),
        ];
    }
}
