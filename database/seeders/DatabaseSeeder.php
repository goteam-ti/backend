<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'phojrengel@gmail.com',
            'password' => bcrypt('password')
        ]);

        // Generate default seeders
        $this->call([
            UserSeeder::class,
        ]);
    }
}
