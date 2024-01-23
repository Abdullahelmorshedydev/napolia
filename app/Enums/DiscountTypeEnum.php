<?php

namespace App\Enums;

enum DiscountTypeEnum: string
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
        return match ($this) {
            self::FIXED => __('admin/enums.fixed'),
            self::PERCENT => __('admin/enums.percent'),
        };
    }

    public function char(): string
    {
        return match ($this) {
            self::FIXED => __('admin/enums.fixed_char'),
            self::PERCENT => __('admin/enums.percent_char'),
        };
    }

    public function calc($price, $discount): string
    {
        return match ($this) {
            self::FIXED => $price - $discount,
            self::PERCENT => $price - $price * ($discount / 100),
        };
    }
}
