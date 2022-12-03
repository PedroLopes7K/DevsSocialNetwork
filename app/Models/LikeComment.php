<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeComment extends Model
{
    use HasFactory;

    protected $table = 'likes_comment';

    protected $fillable = ['id', 'user_id', 'comment_id'];


    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
