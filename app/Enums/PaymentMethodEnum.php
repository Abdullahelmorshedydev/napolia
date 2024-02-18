<?php

namespace App\Enums;

enum PaymentMethodEnum: int
{
    case CASH = 1;
    case VISA = 2;
    case MEEZA = 3;

    public static function values(): array
    {
        return [
            self::CASH->value,
            self::VISA->value,
            self::MEEZA->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::CASH => __('admin/enums.cash'),
            self::VISA => __('admin/enums.visa'),
            self::MEEZA => __('admin/enums.meeza'),
        };
    }
}