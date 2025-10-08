<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cover_photo',
        'profile_picture',
        'bio',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'tiktok_link',
        'github_link',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
