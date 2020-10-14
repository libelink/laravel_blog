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
        <div class="is-capitalized is-size-3">{{$article->title}}</div>
        <p class="is-capitalized">{{$article->content}}</p>
        <br/>
        <hr/>
        <h3>Comments</h3>
        @foreach($comments as $comment)
            <p>{{$comment->comment}}</p>
        @endforeach
    </div>
</div>
@endsection

@section('footer')
    @parent
@endsection
