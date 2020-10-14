<?php

namespace App\Http\Controllers\admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Article;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of articles for a specified user
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $articles=User::find($id)->articles;
        return view('admin.userarticles', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('post.createpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $post_id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $comments = Comment::where('article_id', $post_id)->get();
        $post = Article::find($post_id);
        $user_c_id = Article::find($post_id)->user;

        return view('post.post')
            ->with(compact('post'))
            ->with(compact('comments'))
            ->with(compact('user_c_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('post.editpost',compact('article'));
    }

    /**
     * Return deletepost view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $post = Article::findorfail($id);
        $comments = Comment::where('article_id', $id)->get();
        return view('post.deletepost')
            ->with (compact('post'))
            ->with(compact('comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $article = Article::findorfail($id);
        $article->title=request('title');
        $article->content=request('content');
        $article->save();

        return redirect('/home/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/home/admin/posts');
    }
}
