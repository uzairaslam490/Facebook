<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowedUsers extends Model
{
    use HasFactory;
    protected $fillable = ['followed','followeduser_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }
}
