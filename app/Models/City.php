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

    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'country_id',
        'status',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    protected $casts = [
        'status' => CityStatusEnum::class,
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
