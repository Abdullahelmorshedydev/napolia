<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProductColors extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'product_colors';

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
