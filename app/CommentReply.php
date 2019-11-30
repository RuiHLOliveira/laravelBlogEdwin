<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{
    private $fillable = [
        'comment_id',
        'author',
        'body',
        'is_acive'
    ];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
