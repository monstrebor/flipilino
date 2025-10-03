<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'posted_by',
        'post_text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}

