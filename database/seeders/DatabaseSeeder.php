<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // generate account and dummy task for admin
        $user = User::create([
            'name' => 'Phojie Rengel',
            'email' => 'phojrengel@gmail.com',
            'password' => bcrypt('password')
        ]);

        Task::factory()->for($user)->count(20)->create();

        // Generate default seeders
        $this->call([
            UserSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
