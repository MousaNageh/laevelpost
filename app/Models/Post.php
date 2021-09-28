<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'post',
        'user_id'
    ];
    public function likedBy($user_id){
        return $this->like->contains("user_id",$user_id);
    }
    public function ownedBy($user_id){
        return $user_id ===$this->user_id;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function like(){
        return $this->hasMany(Like::class);
    }
    public function numberOflikesForUserPosts(){
        return $this->hasManyThrough(Like::class,Post::class);
    }

}
