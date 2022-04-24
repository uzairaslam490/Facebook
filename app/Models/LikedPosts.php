<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedPosts extends Model
{
    use HasFactory;
    protected $fillable =['Liked', 'user_id', 'post_id'];
}
