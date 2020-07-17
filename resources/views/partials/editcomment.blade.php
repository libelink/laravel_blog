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
            <form method="POST" action="{{url("/home/comment/{$comment->id}")}}">
                @csrf
                @method('PUT')
                <label for="title">Titre : </label><br/>
                <input type="text" name="subject" class="input" placeholder="Titre" id="title" value="{{$comment->subject}}" required> <br/>
                <label for="content">Contenu : </label><br/>
                <textarea name="comment" class="textarea" placeholder="article" id="content" rows="5" cols="33" required>{{$comment->comment}}</textarea>
                <input type="submit" value="submit">
            </form>
        </div>
    </div>
@endsection
