<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentLike extends Model
{
    protected $table = 'comment_likes';

    protected $fillable = ['comment_id','user_id'];

    public function comment(){
        return $this->belongsTo('App\Comment');
    }
}
