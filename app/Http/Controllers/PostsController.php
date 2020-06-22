<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(){

        $posts = DB::table('users')->get();


        $posts = [
            ['titre' => 'Mon premier post',
            'post'  => 'Mon premier post'],
            ['titre' => 'Mon premier post',
            'post'  => 'Mon premier post']
        ];

        if(!$posts){
            abort(404,'post not found');
        }

        return view('home', compact('posts'));
    }
}
