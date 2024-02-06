<?php

namespace App\Enums;

enum ContactStatusEnum: string
{
    case READ = 'read';
    case UNREAD = 'unread';

    public static function values(): array
    {
        return [
            self::READ->value,
            self::UNREAD->value,
        ];
    }
}