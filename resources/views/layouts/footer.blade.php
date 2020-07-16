@extends('layouts.app')

@section('title', 'Page Title')

@section('header')
    @parent

@section('content')
<section class="hero is-medium is-primary is-bold">
    <div class="hero-body">
        <div class="container">
            <h1 class="title">
                Primary bold title
            </h1>
            <h2 class="subtitle">
                Primary bold subtitle
            </h2>
        </div>
    </div>
</section>
@endsection

@section('footer')
    @parent
