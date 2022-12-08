<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAnswer extends Model
{
    use HasFactory;


    protected $table = 'comments_answers';

    protected $fillable = [
        'id',
        'user_id',
        'comment_id',
        'body'
    ];

    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
