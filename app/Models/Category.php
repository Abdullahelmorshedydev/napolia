<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $table = 'categories';

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'category_id',
        'status',
    ];

    public static $status = ['active', 'desactive'];

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

    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'morphable');
    }
}
