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
        <div class="column is-three-fifths is-offset-one-fifth">
            <div class="is-capitalized is-size-3">{{$post->title}}</div>
            <p class="is-capitalized">{{$post->content}}</p>
            @foreach($comments as $comment)
                <div class="is-size-4">{{$comment->subject}}</div>
                <p>{{$comment->comment}}</p>
            @endforeach
            <form method="POST" action="/home/post/{{$post->id}}">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete">
            </form>
        </div>
    </div>
@endsection


@section('footer')
    @parent
@endsection
