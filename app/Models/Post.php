<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post','image','user_id'];

    public function likedposts(){
        return $this->hasOne(LikedPosts::class);
    }
    public function followeduserposts(){
        return $this->belongsTo(FollowedUsers::class, 'followeduser_id');
    }
    public function user(){
        return $this->hasOne(User::class);
    }
}
