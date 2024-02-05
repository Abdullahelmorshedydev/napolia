<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PENDING = 'pending';
    case PROCCESSING = 'proccessing';
    case COMPLETED = 'completed';
    case CANCELED = 'canceled';
    case SHIPPED = 'shipped';

    public static function values(): array
    {
        return [
            self::PENDING->value,
            self::PROCCESSING->value,
            self::COMPLETED->value,
            self::CANCELED->value,
            self::SHIPPED->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::PENDING => __('admin/enums.pending'),
            self::PROCCESSING => __('admin/enums.proccessing'),
            self::COMPLETED => __('admin/enums.completed'),
            self::CANCELED => __('admin/enums.canceled'),
            self::SHIPPED => __('admin/enums.shipped'),
        };
    }
}