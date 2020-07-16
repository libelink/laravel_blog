@extends('layouts.layout')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
<div class="content columns">
    <div class="column is-four-fifths is-offset-1">
        <div class="is-capitalized is-size-3">{{$post->title}}</div>
        <p class="is-capitalized">{{$post->content}}</p>
        <br/>
        @foreach($comments as $comment)
            <div class="is-size-4">
                <form method="POST" action="/home/comment/{{$comment->id}}">
                    @csrf
                    @method('DELETE')
                    <div class="field is-grouped">
                        <p class="control">
                             {{$comment->subject}}
                        </p>
                        <p class="control">
                            <input class="button is-danger is-small" type="submit" value="x"/>
                        </p>
                        <p class="control">
                            <a href="/home/comment/{{$comment->id}}/edit">
                                <button class="button is-info is-small" type="button">edit</button>
                            </a>
                        </p>
                    </div>
                </form>
            </div>
            <p>{{$comment->comment}}</p>
        @endforeach
        <br/>
        @include ('partials.createcomment')
    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection
