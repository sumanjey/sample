<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id','heading','content'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function usercomments(){
        return $this->belongsToMany(User::class,'post_user')->withPivot(['comment']);
    }
}