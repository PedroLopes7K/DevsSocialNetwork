<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'body',
        'user_id',
        'section'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function userLikedPost()
    {
        return (bool) $this->likes->where('user_id', auth()->id())->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
