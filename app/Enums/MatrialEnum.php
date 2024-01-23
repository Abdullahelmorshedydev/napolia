<?php

namespace App\Enums;

enum MatrialEnum: string
{
    case RED = 'red';
    case GREEN = 'green';
    case BLACK = 'black';

    public static function values(): array
    {
        return [
            self::RED->value,
            self::GREEN->value,
            self::BLACK->value,
        ];
    }

    public function lang(): string
    {
        return match ($this) {
            self::RED => __('admin/enums.red'),
            self::GREEN => __('admin/enums.green'),
            self::BLACK => __('admin/enums.black'),
        };
    }
}
