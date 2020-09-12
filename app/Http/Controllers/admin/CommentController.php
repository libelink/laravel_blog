<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Comment;
use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * no need of a show method, all comments are linked to an article
     * no need of a show(id) or create method to show a form, the form is present in the post
     * no need of an edit or delete method (same)
     * store destroy and update methods
     */

    /**
     * Store a the comment created in the post .
     * @param $id
     * @return redirect
     */
    public function edit($id)
    {

        $comment=Comment::findorfail($id);
        return view('partials.editcomment',compact('comment'));
    }

    /**
     * Store a the comment created in the post .
     * @return redirect
     */
    public function store($id)
    {
        request()->validate([
            'comment'=>'required'
        ]);

        $comment=new Comment();
        $comment->comment=request('comment');
        $article=Article::findorfail($id);
        $comment->article_id=$article->getKey();
        $comment->user_id= Auth::user()->id;
        $comment->save();

        return redirect()->route('post', ['id' => $article->getKey()]);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @return redirect
     */
    public function update($id)
    {
        request()->validate([
            'comment'=>'required'
        ]);

        $comment=Comment::findorfail($id);
        $article_id = $comment->article_id;
        $comment->comment = request('comment');
        $comment -> save();
        return redirect()->route('post', ['id' => $article_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::findorfail($id);
        $article_id = $comment->article_id;
        $comment->delete();

        return redirect()->route('post', ['id' => $article_id]);
    }
}
