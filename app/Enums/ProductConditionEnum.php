<?php

namespace App\Enums;

enum ProductConditionEnum: string
{
    case DEFAULT = 'default';
    case HOT = 'hot';
    case NEW = 'new';

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