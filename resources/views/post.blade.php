<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>homepage</title>
</head>
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">{{$post->title}}</div>
        <p>{{$post->content}}</p>

        @foreach($commentss as $comment)
            <div class="title m-b-md"><a href ="/home/post/{{$comment->id}}">{{$comment->suject}}</a></div>
            <p>{{$comment->comment}}</p>
        @endforeach
    </div>

</div>
</body>
</html>
