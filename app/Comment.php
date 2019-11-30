<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    private $fillable = [
        'post_id',
        'author',
        'body',
        'is_acive'
    ];
    
    public function replies() {
        return $this->hasMany('App\CommentReply')
    }
}
