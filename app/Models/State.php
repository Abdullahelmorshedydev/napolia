<?php

namespace App\Models;

use App\Enums\StateStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'states';

    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'city_id',
        'status',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    protected $casts = [
        'status' => StateStatusEnum::class,
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }
}
