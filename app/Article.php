<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class article extends Model
{
    protected $fillable = [
        'title', 'content', 'user_id',
    ];

    // un article a un auteur (one to one)
    public function user(){
        return $this->belongsTo('App\User');
    }


    //un article a des commentaires (one to many)
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
}
