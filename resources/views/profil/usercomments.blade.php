@extends('layouts.layout')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="columns">
        <div class="content">
            @foreach($comments as $comment)
                <div class="column title">{{$comment->subject}}</div>
                <p>{{$comment->comment}}</p>
            @endforeach
        </div>
@endsection

@section('footer')
    @parent
@endsection
