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
            'password' => bcrypt('password'),
        ]);

        Task::factory()
            ->count(10)
            ->for($user)
            ->create();

        // Generate default seeders (Uncomment below if you want to use default seeders)
        $this->call([
            // UserSeeder::class,
            // TaskSeeder::class,
        ]);
    }
}
