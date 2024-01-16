<?php

namespace App\Models;

use App\Enums\CityStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'cities';

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'country_id',
        'status',
    ];

    protected $casts = [
        'status' => CityStatusEnum::class,
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
}
