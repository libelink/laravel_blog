<?php

namespace App\Http\Controllers;

use App\articles;
use DB;

class PostsController extends Controller
{
    public function show(){

        $posts = Articles::all();
        /*$posts = DB::table('articles')->get();
        dd($post);
        $post = [
            'titre' => 'Mon premier post',
            'post'  => 'Mon premier post'
        ];

        if(!$post){
            abort(404,'post not found');
        }*/

        return view('home',[
            'posts' => $posts
        ]);
    }
}
