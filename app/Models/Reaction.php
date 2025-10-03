<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_image_id',
        'user_id',
        'type',
    ];

    public function image()
    {
        return $this->belongsTo(PostImage::class, 'post_image_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

