<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    public function countcomments(){
       return  $this->count();
    }

    public function CommentsByUser($id){
        return $this->hasOne('App\Comment', 'article_id' );
    }

}
