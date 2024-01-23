<?php

namespace App\Models;

use App\Enums\CategoryStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'categories';

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'category_id',
        'status',
    ];

    protected $casts = [
        'status' => CategoryStatusEnum::class,
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'morphable');
    }
}
