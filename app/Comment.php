<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //un commentaire a un auteur
    public function user(){
        return $this->belongsTo('App\User');
    }

    //un commentaire pour un article
    public function article(){
        return $this->belongsTo('App\Article');
    }
}
