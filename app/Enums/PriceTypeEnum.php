<?php

namespace App\Enums;

enum PriceTypeEnum: string
{
    case POUND = 'pound';
    case DOLLAR = 'dollar';

    public static function values(): array
    {
        return [
            self::POUND->value,
            self::DOLLAR->value,
        ];
    }

    public function lang(): string
    {
        return match ($this) {
            self::POUND => __('admin/enums.pound'),
            self::DOLLAR => __('admin/enums.dollar'),
        };
    }

    public function char(): string
    {
        return match ($this) {
            self::POUND => __('admin/enums.pound_char'),
            self::DOLLAR => __('admin/enums.dollar_char'),
        };
    }

    public function calc($price, $dollar_price)
    {
        return match ($this) {
            self::POUND => $price,
            self::DOLLAR => $price * $dollar_price,
        };
    }
}
