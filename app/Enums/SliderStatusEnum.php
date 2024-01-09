<?php

namespace App\Enums;

enum SliderStatusEnum: string
{
    case ACTIVE = 'active';
    case DESACTIVE = 'desactive';

    public function lang(): string
    {
        return match ($this)
        {
            self::ACTIVE => __('admin/enums.active'),
            self::DESACTIVE => __('admin/enums.desactive'),
        };
    }
}