<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'post_id',
        'user_id'
    ];
    use HasFactory;
    public function post(){
        return $this->belongsToMany(Post::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
