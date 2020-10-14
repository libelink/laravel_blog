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
        <form method="POST" action="{{ route('updatearticle',$article->id) }}">
            @csrf
            @method('PATCH')
            <label for="title">Titre de l'article : </label><br/>
            <input type="text" name="title" class="input @error('title') is-danger @enderror" placeholder="Titre" id="title" value="{{$article->title}}" > <br/>
            @error('title') <p class="help is-danger">{{$errors->first('title')}}</p>@enderror
            <label for="content">Contenu : </label><br/>
            <textarea name="content" class="textarea @error('title') is-danger @enderror" placeholder="article" id="content" rows="5" cols="33">{{$article->content}}</textarea>
            @error('content') <p class="help is-danger">{{$errors->first('content')}}</p>@enderror
            <input type="submit" value="submit">
        </form>
    </div>
</div>
@endsection


@section('footer')
@parent
@endsection
