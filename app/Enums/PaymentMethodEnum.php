<?php

namespace App\Enums;

enum PaymentMethodEnum: string
{
    case CASH = 'CASH';
    case VISA = 'VISA/MASTER';
    case MEEZA = 'MEEZA';

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