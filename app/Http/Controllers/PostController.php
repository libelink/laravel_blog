<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Article;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function show(Article $article){
        // Si on utilise eloquent (1), pas de problème qd post seul eloquent resout directement si (2) erreur
        //Cette ligne n'est pas nécessaire si on utilise la collection Article en para : $post = Articles::findorfail($id);
        $comments = Comment::where('article_id', $article)->get();
        $userid= $article->user_id;
        $user_c_id= User::findorfail($userid);

        return view('post')
            ->with(compact('article'))
            ->with(compact('comments'))
            ->with(compact('user_c_id'));
    }
}
