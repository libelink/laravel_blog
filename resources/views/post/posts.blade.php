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
        {{--@if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif--}}

        <div class="content">
            @foreach($posts as $post)
                <div class="column title no-padding-left"><a href ="{{URL("/home/admin/post/{$post->id}/post")}}">{{$post->title}}</a></div>
                <div>
                    <a class="" href="{{ route('editarticle',$post->id)}}"
                       onclick="event.preventDefault();document.getElementById('editpost').submit();">
                        edit
                    </a>

                    <form id="editpost" action="{{ route('editarticle',$post->id) }}" method="GET"
                          style="display: none;">
                        @csrf
                    </form>

                    <a class="" href="{{ route('destroyarticle', $post->id) }}"
                       onclick="event.preventDefault();document.getElementById('destroypost').submit();">
                        delete
                    </a>

                    <form id="destroypost" action="{{ route('destroyarticle', $post->id) }}" method="POST"
                          style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <p>{{$post->content}}</p>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
