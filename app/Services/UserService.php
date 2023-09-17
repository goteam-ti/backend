<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(array $attributes): User
    {
        $user = User::create($attributes);

        return $user;
    }
}
