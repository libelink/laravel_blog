<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(){

        $posts = DB::table('articles')->get();
        //dd($posts);
        /*$posts = [
            'titre' => 'Mon premier post',
            'post'  => 'Mon premier post'
        ];*/

        if(!$posts){
            abort(404,'post not found');
        }

        return view('home',[
            'posts' => $posts
        ]);
    }
}
