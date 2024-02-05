<?php

namespace App\Enums;

enum CartStatusEnum: string
{
    case CARTED = 'carted';
    case ORDERED = 'ordered';

    public static function values(): array
    {
        return [
            self::CARTED->value,
            self::ORDERED->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::CARTED => __('admin/enums.carted'),
            self::ORDERED => __('admin/enums.ordered'),
        };
    }
}