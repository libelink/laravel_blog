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
                    <div class="column title"><a href ="{{URL("/home/post/{$post->id}")}}">{{$post->title}}</a></div>
                    <p>{{$post->content}}</p>
                @endforeach
            </div>
        </div>
@endsection

@section('footer')
    @parent
@endsection
