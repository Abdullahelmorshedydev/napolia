<?php

namespace App\Models;

use App\Enums\BlogStatusEnum;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'blogs';

    public static $img_path = 'uploads/blogs/';

    public $translatable = ['title','slug' , 'article'];

    protected $fillable = [
        'title',
        'slug',
        'article',
        'admin_id',
        'status',
    ];

    public function getRouteKeyName()
    {
        $locale = app()->getLocale();
        return "slug->{$locale}";
    }

    protected $casts = [
        'status' => BlogStatusEnum::class,
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function image() : MorphOne
    {
        return $this->MorphOne(Image::class, 'morphable');
    }
}
