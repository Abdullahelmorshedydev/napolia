<?php

namespace App\Models;

use App\Enums\SliderStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders';

    public static $img_path = 'uploads/sliders/';

    protected $fillable = [
        'status',
    ];

    protected $casts = [
        'status' => SliderStatusEnum::class,
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'morphable');
    }
}
