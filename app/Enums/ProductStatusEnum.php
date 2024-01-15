<?php

namespace App\Enums;

enum ProductStatusEnum: string
{
    case ACTIVE = 'active';
    case DESACTIVE = 'deactive';

    public static function values(): array
    {
        return [
            self::ACTIVE->value,
            self::DESACTIVE->value,
        ];
    }

    public function lang(): string
    {
        return match ($this)
        {
            self::ACTIVE => __('admin/enums.active'),
            self::DESACTIVE => __('admin/enums.desactive'),
        };
    }
}