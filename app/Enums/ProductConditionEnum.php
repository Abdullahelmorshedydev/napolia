<?php

namespace App\Enums;

enum ProductConditionEnum: int
{
    case DEFAULT = 1;
    case HOT = 2;
    case NEW = 3;

    public static function values(): array
    {
        return [
            self::DEFAULT->value,
            self::HOT->value,
            self::NEW->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::DEFAULT => __('admin/enums.default'),
            self::HOT => __('admin/enums.hot'),
            self::NEW => __('admin/enums.new'),
        };
    }
}