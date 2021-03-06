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
    <div class="column">
        <form method="POST" action="{{url('/home/admin/post/store')}}">
            @csrf
            <label for="title">Titre de l'article : </label><br/>
            <input type="text"  class="input @error('title') is-danger @enderror" name="title" placeholder="Titre" id="title"> <br/>
            @error('title') <p class="help is-danger">{{$errors->first('title')}}</p>@enderror
            <label for="content">Contenu : </label><br/>
            <textarea name="content" class="textarea @error('title') is-danger @enderror" placeholder="article" id="content" rows="5" cols="33"></textarea>
            @error('content') <p class="help is-danger">{{$errors->first('content')}}</p>@enderror
            <br/>
            <input type="submit" value="submit">
        </form>
    </div>
</div>
@endsection


@section('footer')
    @parent
@endsection
