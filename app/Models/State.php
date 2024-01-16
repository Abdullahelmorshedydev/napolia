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

    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'country_id',
        'city_id',
        'status',
    ];

    protected $casts = [
        'status' => StateStatusEnum::class,
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
