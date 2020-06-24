<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function show($post){

        $posts = DB::table('articles')->where('id', $post)->get();

        return view('home',[
            'posts' => $posts
        ]);

    }
}
