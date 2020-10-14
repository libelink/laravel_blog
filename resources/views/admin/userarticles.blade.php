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
                <div class="column title"><a href ="{{URL("/home/admin/post/{$article->id}/post")}}">{{$article->title}}</a></div>
                <div>
                    <a class="" href="{{ route('editarticle',$article->id)}}"
                       onclick="event.preventDefault();document.getElementById('editpost').submit();">
                        edit
                    </a>

                    <form id="editpost" action="{{ route('editarticle',$article->id) }}" method="GET"
                          style="display: none;">
                        @csrf
                    </form>

                    <a class="" href="{{ route('destroyarticle', $article->id) }}"
                       onclick="event.preventDefault();document.getElementById('destroypost').submit();">
                        delete
                    </a>

                    <form id="destroypost" action="{{ route('destroyarticle', $article->id) }}" method="POST"
                          style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <p>{{$article->content}}</p>
            @endforeach
        </div>
@endsection

@section('footer')
    @parent
@endsection
