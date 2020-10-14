<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Article;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->get();
        $articles = Article::where('user_id',$id)->get();
        //$commentsofuser = Comment::all()->where('user_id', $id);
        $commentsofuser = User::find($id)->comments;
        //pdre tout les articles, faire une jointure entre l'id article_id de comment et les id de la table article
        //et pdre uniquement ceux de l'utilisateur, on a les commentaires des articles écrit par l'user
        /*$commentsbyuser = Article::query()
                                ->join('comments', 'article_id','=', 'articles.id')
                                ->where('articles.user_id',$id)
                                ->get();*/
        $commentsbyuser = User::find($id)->articlesComments;
        return view('profil')
            ->with(compact('user'))
            ->with(compact('commentsofuser'))
            ->with(compact('commentsbyuser'))
            ->with(compact('articles'));
    }

    public function showposts(){
        $posts = Article::all();
        return view('post.posts',[
            'posts' => $posts
        ]);
    }

    public function showmycomments($id){
        $user = User::where('id', $id)->get();
        $comments = Comment::all()->where('user_id', $id);
        //dd($user);
        return view('admin.usercomments')
            ->with(compact('user'))
            ->with(compact('comments'));
    }
    public function showmyarticles_comments($id){
        $user = User::where('id', $id)->get();
        $articles = Article::where('user_id',$id)->get();
        //pdre tout les articles, faire une jointure entre l'id article_id de comment et les id de la table article
        //et pdre uniquement ceux de l'utilisateur, on a les commentaires des articles écrit par l'user
        $comments = User::find($id)->articlesComments;
        return view('admin.userarticles_comments')
            ->with(compact('user'))
            ->with(compact('comments'))
            ->with(compact('articles'));
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('admin.editprofil', compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $user = Auth::user();
        request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));

        Auth::user()->save();

        return back();
    }

}
