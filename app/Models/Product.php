<?php

namespace App\Models;

use App\Enums\DiscountTypeEnum;
use App\Enums\PriceTypeEnum;
use App\Enums\ProductStatusEnum;
use App\Enums\ProductConditionEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'products';

    public static $img_path = 'uploads/products/';

    public $translatable = ['name', 'description', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'code',
        'quantity',
        'price',
        'price_type',
        'discount',
        'discount_type',
        'status',
        'condition',
        'description',
        'sales_count',
        'shipping_time',
        'category_id',
        'sub_category_id',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    protected $casts = [
        'status' => ProductStatusEnum::class,
        'condition' => ProductConditionEnum::class,
        'discount_type' => DiscountTypeEnum::class,
        'price_type' => PriceTypeEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function images() : MorphMany
    {
        return $this->morphMany(Image::class, 'morphable');
    }

    public function colors()
    {
        return $this->hasMany(ProductColors::class);
    }

    public function favourites()
    {
        return $this->hasMay(Favourite::class);
    }

    public function productRate()
    {
        return $this->hasMany(ProductRate::class);
    }
}
