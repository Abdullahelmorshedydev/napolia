<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminProfile extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'admin_profiles';

    public static $img_path = 'uploads/profiles/';

    public $translatable = ['bio', 'job_title'];

    protected $fillable = [
        'admin_id',
        'bio',
        'job_title',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
