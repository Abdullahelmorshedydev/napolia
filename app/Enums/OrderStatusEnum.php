<?php

namespace App\Enums;

enum OrderStatusEnum: int
{
    case PENDING = 1;
    case PROCCESSING = 2;
    case COMPLETED = 3;
    case CANCELED = 4;
    case SHIPPED = 5;

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

    public function icon(): string
    {
        return match ($this)
        {
            self::PENDING => 'fas fa-clock',
            self::PROCCESSING => 'fas fa-clock',
            self::COMPLETED => 'fa fa-check-circle',
            self::CANCELED => 'fas fa-times',
            self::SHIPPED => 'fas fa-shipping-fast',
        };
    }

    public function message(): string
    {
        return match ($this)
        {
            self::PENDING => __('site/order.pending_enum_msg'),
            self::PROCCESSING => __('site/order.proccessing_enum_msg'),
            self::COMPLETED => __('site/order.completed_enum_msg'),
            self::CANCELED => __('site/order.cancel_enum_msg'),
            self::SHIPPED => __('site/order.shipped_enum_msg'),
        };
    }

    public function header(): string
    {
        return match ($this)
        {
            self::PENDING => __('site/order.pending_enum_header'),
            self::PROCCESSING => __('site/order.proccessing_enum_header'),
            self::COMPLETED => __('site/order.completed_enum_header'),
            self::CANCELED => __('site/order.cancel_enum_header'),
            self::SHIPPED => __('site/order.shipped_enum_header'),
        };
    }

    public function adminButtonClass(): string
    {
        return match ($this)
        {
            self::PENDING => 'btn btn-info',
            self::PROCCESSING => 'btn btn-primary',
            self::COMPLETED => 'btn btn-success',
            self::SHIPPED => 'btn btn-success',
        };
    }

    public function adminButtonLink(): string
    {
        return match ($this)
        {
            self::PENDING => 'admin.orders.proccess',
            self::PROCCESSING => 'admin.orders.ship',
            self::COMPLETED => '#',
            self::CANCELED => '#',
            self::SHIPPED => 'admin.orders.complete',
        };
    }

    public function adminButtonLang(): string
    {
        return match ($this)
        {
            self::PENDING => __('admin/order.proccess'),
            self::PROCCESSING => __('admin/order.ship'),
            self::COMPLETED => '#',
            self::CANCELED => '#',
            self::SHIPPED => __('admin/order.complete'),
        };
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