<?php

namespace App\Models;

use App\Enums\CountryStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'countries';

    public $translatable = ['name', 'slug'];

    protected $fillable = [
        'name',
        'slug',
        'status',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    protected $casts = [
        'status' => CountryStatusEnum::class,
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
