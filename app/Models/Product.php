<?php

namespace App\Models;

use App\Enums\ProductConditionEnum;
use App\Enums\ProductStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $table = 'products';

    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'discount',
        'status',
        'condition',
        'description',
        'sales_count',
        'category_id',
        'sub_category_id',
    ];

    protected $casts = [
        'status' => ProductStatusEnum::class,
        'condition' => ProductConditionEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function images() : MorphMany
    {
        return $this->morphMany(Image::class, 'morphable');
    }
}
