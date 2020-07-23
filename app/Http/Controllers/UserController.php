<?php

namespace App\Http\Controllers;

use App\articles;
use Illuminate\Http\Request;
use App\User;
use App\Comment;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        $articles = Articles::where('user_id',$id)->get();
        $commentsofuser = Comment::all()->where('user_id', $id);
        //pdre tout les articles, faire une jointure entre l'id article_id de comment et les id de la table article
        //et pdre uniquement ceux de l'utilisateur, on a les commentaires des articles écrit par l'user
        $commentsbyuser = Articles::query()
                                ->join('comments', 'article_id','=', 'articles.id')
                                ->where('articles.user_id',$id)
                                ->get();
        return view('profil')
            ->with(compact('user'))
            ->with(compact('commentsofuser'))
            ->with(compact('commentsbyuser'))
            ->with(compact('articles'));
    }

    public function showmycomments($id){
        $user = User::where('id', $id)->get();
        $comments = Comment::all()->where('user_id', $id);
        return view('profil.usercomments')
            ->with(compact('user'))
            ->with(compact('comments'));
    }
    public function showmyarticles_comments($id){
        $user = User::where('id', $id)->get();
        $articles = Articles::where('user_id',$id)->get();
        //pdre tout les articles, faire une jointure entre l'id article_id de comment et les id de la table article
        //et pdre uniquement ceux de l'utilisateur, on a les commentaires des articles écrit par l'user
        $comments = Articles::query()
            ->join('comments', 'article_id','=', 'articles.id')
            ->where('articles.user_id',$id)
            ->get();
        return view('profil.userarticles_comments')
            ->with(compact('user'))
            ->with(compact('comments'))
            ->with(compact('articles'));
    }

}
