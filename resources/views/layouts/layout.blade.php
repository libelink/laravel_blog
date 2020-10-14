<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Name - @yield('title')</title>
    <!-- Styles -->
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    @include('./layouts/header')

    <div class="container">
        @yield('content')
    </div>

    @include('./layouts/footer')

</body>
</html>
