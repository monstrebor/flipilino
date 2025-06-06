<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'posted_by',
        'caption',
        'post_image',
        'post_text',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'posted_by', 'id');
    }
}
