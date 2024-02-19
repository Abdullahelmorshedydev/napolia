<?php

namespace App\Models;

use App\Enums\OrderStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public static $img_path = 'uploads/orders/';

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'country_id',
        'city_id',
        'state_id',
        'address',
        'shipping_price',
        'notes',
        'status',
        'discount',
        'total',
        'payment_method',
    ];

    public $casts = [
        'status' => OrderStatusEnum::class,
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function vodafoneImage() : MorphMany
    {
        return $this->morphMany(Image::class, 'morphable');
    }
}
