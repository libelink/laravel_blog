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
        <h1> Hi, {{$user[0]->name}}</h1>
        <div> name: {{$user[0]->name}}</div>
        <p> email: {{$user[0]->email}}</p>
    </div>
</div>
</body>
</html>
