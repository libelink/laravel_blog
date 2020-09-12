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

        return view('post.post')
            ->with(compact('article'))
            ->with(compact('comments'))
            ->with(compact('user_c_id'));
    }

    public function create(){
        return view ('post.createpost');
    }

    public function edit(Article $article){
        //$article = Articles::findorfail($id);
        return view('post.editpost',compact('article'));
    }

    public function delete($id){
        $post = Article::findorfail($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('post.deletepost')
            ->with (compact('post'))
            ->with(compact('comments'));
    }



    public function store(){
        //dump(request()->all());
        // possible car on a créé le modèle "articles"
        /*
         * first version
         *
         * request()->validate([
         *   'title'=>'required',
         *   'content'=>'required'
         * ]);

         * $articles = new Articles();
         * $articles->title= request('title');
         * $articles->content= request('content');
         * $articles->user_id= Auth::user()->id;
         * $articles->save();
         */
        //second version
        request()->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        Article::create([
            'title'=> request('title'),
            'content'=> request('content'),
            'user_id'=> Auth::user()->id
        ]);

        if(Auth::check()){
            return redirect()->route('userarticles', Auth::user()->id);
        }
        return redirect('/home');
    }

    public function update($id){
        request()->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $article = Article::findorfail($id);
        $article->title=request('title');
        $article->content=request('content');
        $article->save();

        return redirect('/home');
    }

    public function destroy($id){
        //$comments = Comment::where('article_id',$id)->delete();
        $article = Article::find($id);
        $article->delete();

        return redirect('/home');
    }
}
