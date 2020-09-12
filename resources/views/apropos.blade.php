@extends('layouts.layout')

@section('title', 'Page Title')

@section('navbar')
    @parent
@endsection

@section('header')
    @parent
@endsection

@section('content')
    <div class="column is-four-fifths is-offset-1">
        <h1 class="is-size-3">A propos</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed fermentum interdum sem. Integer est neque, tristique vel semper vitae, dapibus eget eros. Proin pellentesque nisl quam, sed tincidunt orci euismod eget. Nulla facilisi. Ut finibus sem lorem, nec blandit purus fringilla at. Donec interdum odio sit amet libero ultrices molestie. Etiam vitae porttitor mauris. Pellentesque eu gravida mi, posuere tincidunt erat. Sed odio ipsum, maximus non cursus eget, blandit nec augue. Pellentesque quis tincidunt est. Cras luctus aliquet diam ut congue. Mauris in dictum mauris, vel ullamcorper ipsum. Mauris rutrum tristique faucibus. Donec at arcu arcu. Sed tincidunt sollicitudin augue, sit amet pretium nunc egestas quis. Maecenas et sapien neque. </p>
        <p>Nulla dignissim tortor in nisl semper bibendum. Sed ut sapien et ipsum suscipit faucibus. Quisque libero dui, consequat id faucibus sed, interdum vitae ante. Pellentesque ex nisi, fringilla bibendum leo ut, faucibus placerat metus. Nullam mauris ante, viverra vel est ac, dictum eleifend ex. Quisque imperdiet maximus placerat. Phasellus ultrices, elit sed accumsan finibus, nisl lorem feugiat nulla, ac eleifend magna tellus a est. Duis tincidunt sit amet urna id pretium. </p>
    </div>
@endsection

@section('footer')
    @parent
@endsection
