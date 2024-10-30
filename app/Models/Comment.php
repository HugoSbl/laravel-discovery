<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = ['message'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blog ()
    {
        return $this->belongsTo(Blog::class);
    }
    
}