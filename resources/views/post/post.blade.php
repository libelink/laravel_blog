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
            <div class="is-capitalized is-size-3">{{$post->title}}</div>

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

            <p class="is-capitalized">{{$post->content}}</p>
            <br/>
            <hr/>
            <h3>Comments</h3>
            @include ('partials.createcomment')
            @foreach($comments as $comment)
                <div>
                    <div class="is-size-4">
                        <p>{{$user_c_id->name}} says:</p>
                    </div>
                    <div>
                        <a class="" href="{{ route('editcomment',$comment->id)}}"
                           onclick="event.preventDefault();document.getElementById('editcomment').submit();">
                            edit
                        </a>

                        <form id="editcomment" action="{{ route('editcomment',$comment->id) }}" method="GET"
                              style="display: none;">
                            @csrf
                        </form>

                        <a class="" href="{{ route('destroycomment', $comment->id) }}"
                           onclick="event.preventDefault();document.getElementById('destroycomment').submit();">
                            delete
                        </a>

                        <form id="destroycomment" action="{{ route('destroycomment', $comment->id) }}" method="POST"
                              style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
                <p>{{$comment->comment}}</p>
            @endforeach
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection
