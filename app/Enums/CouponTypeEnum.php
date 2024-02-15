<?php

namespace App\Enums;

enum CouponTypeEnum: string
{
    case FIXED = 'fixed';
    case PERCENT = 'percent';

    public static function values(): array
    {
        return [
            self::FIXED->value,
            self::PERCENT->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::FIXED => __('admin/enums.fixed'),
            self::PERCENT => __('admin/enums.percent'),
        };
    }

    public function calc($price, $value): string
    {
        return match ($this) {
            self::FIXED => $price - $value,
            self::PERCENT => $price - $price * ($value / 100),
        };
    }
}