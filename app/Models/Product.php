<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

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

    public static $status = ['active', 'desactive'];
    public static $condition = ['default','new','hot'];

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
