<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'slug',
        'description',
        'is_active',
        'category',
    ];

    public function images()
    {
        return $this->morphMany(Media::class, 'imageable');
    }
}
