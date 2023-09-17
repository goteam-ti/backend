<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    // We can add more statuses here such as 'pending', 'rejected', 'approved', etc.
    case INCOMPLETE = 'incomplete';
    case COMPLETE = 'complete';
}
