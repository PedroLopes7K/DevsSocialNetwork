<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'post_id',
        'body'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(LikeComment::class);
    }

    public function userLikedComment()
    {
        return (bool) $this->likes->where('user_id', auth()->id())->count();
    }

    public function answers()
    {
        return $this->hasMany(CommentAnswer::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
