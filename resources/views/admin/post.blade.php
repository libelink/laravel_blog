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
                        <a class="" href="{{ route('editprofil',auth()->id()) }}"
                           onclick="event.preventDefault();document.getElementById('editprofil').submit();">
                            edit
                        </a>

                        <form id="editprofil" action="{{ route('editprofil',auth()->id()) }}" method="GET"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>

                        <a class="" href="{{ route('editprofil',auth()->id()) }}"
                           onclick="event.preventDefault();document.getElementById('editprofil').submit();">
                            delete
                        </a>

                        <form id="editprofil" action="{{ route('editprofil',auth()->id()) }}" method="GET"
                              style="display: none;">
                            {{ csrf_field() }}
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
