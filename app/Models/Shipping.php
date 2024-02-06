<?php

namespace App\Models;

use App\Enums\PriceTypeEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    protected $fillable = [
        'price',
        'price_type',
        'state_id',
    ];

    protected $casts = [
        'price_type' => PriceTypeEnum::class,
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
