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
        <form method="POST" action="{{url('/home/post/store')}}">
            @csrf
            <label for="title">Titre de l'article : </label><br/>
            <input type="text" name="title" class="input" placeholder="Titre" id="title" required> <br/>
            <label for="content">Contenu : </label><br/>
            <textarea name="content" class="textarea" placeholder="article" id="content" rows="5" cols="33" required></textarea>
            <input type="submit" value="submit">
        </form>
    </div>
</div>
@endsection


@section('footer')
    @parent
@endsection
