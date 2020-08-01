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
            @foreach($articles as $article)
                <div class="column title"><a href ="{{URL("/home/post/{$article->id}")}}">{{$article->title}}</a></div>
                <p>{{$article->content}}</p>
            @endforeach
        </div>
@endsection

@section('footer')
    @parent
@endsection
