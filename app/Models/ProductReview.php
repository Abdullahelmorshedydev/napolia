<?php

namespace App\Models;

use App\Enums\ReviewStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $table = 'product_reviews';

    protected $fillable = [
        'product_id',
        'name',
        'email',
        'review_title',
        'review_message',
        'status',
    ];

    protected $casts = [
        'status' => ReviewStatusEnum::class,
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
