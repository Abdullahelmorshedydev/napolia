<?php

namespace App\Models;

use App\Enums\BlogStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = 'blog_comments';

    protected $fillable = [
        'name',
        'email',
        'comment',
        'status',
        'blog_id',
    ];

    protected $casts = [
        'status' => BlogStatusEnum::class,
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
