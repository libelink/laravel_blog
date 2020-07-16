<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\articles;
use App\Comment;

class PostController extends Controller
{
    public function show($id){
        // Si on utilise eloquent (1), pas de problème qd post seul eloquent resout directement si (2) erreur
        $post = Articles::findorfail($id);
        $comments = Comment::where('article_id', $id)->get();

        return view('post.post')
            ->with(compact('post'))
            ->with(compact('comments'));
    }

    public function create(){
        return view ('post.createpost');
    }

    public function edit($id){
        $article = Articles::findorfail($id);
        return view('post.editpost',compact('article'));
    }

    public function delete($id){
        $post = Articles::findorfail($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('post.deletepost')
            ->with (compact('post'))
            ->with(compact('comments'));
    }



    public function store(){
        //dump(request()->all());
        // possible car on a créé le modèle "articles"

        $articles = new Articles();
        $articles->title= request('title');
        $articles->content=request('content');
        $articles->save();

        return redirect('/home');

    }

    public function update($id){
        $article = Articles::findorfail($id);
        $article->title=request('title');
        $article->content=request('content');
        $article->save();

        return redirect('/home');


    }

    public function destroy($id){
        $comments = Comment::where('article_id',$id)->delete();
        $article = Articles::find($id);
        $article->delete();

        return redirect('/home');
    }
}
