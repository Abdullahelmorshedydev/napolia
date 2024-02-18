<?php

namespace App\Enums;

enum ContactStatusEnum: int
{
    case READ = 1;
    case UNREAD = 2;

    public static function values(): array
    {
        return [
            self::READ->value,
            self::UNREAD->value,
        ];
    }
}