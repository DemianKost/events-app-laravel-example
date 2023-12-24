<?php

declare(strict_type=1);

namespace App\Enums;

enum Status: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
}