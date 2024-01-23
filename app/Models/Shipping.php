<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shippings';

    protected $fillable = [
        'price',
        'state',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
