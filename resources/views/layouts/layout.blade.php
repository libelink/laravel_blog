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

    @section('navbar')
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <h1 class="is-size-3 has-text-weight-bold has-text-primary">BLOG</h1>
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="/">
                        Home
                    </a>
                    <a class="navbar-item" href="/home/apropos">
                        About
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        @guest
                            <div class="buttons">
                                <a class="button is-primary" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                </a>
                                <a class="button is-light" href="{{route('login')}}">
                                    {{__('Login')}}
                                </a>
                            </div>
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="#">{{ ucfirst(Auth::user()->name) }}</a>

                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="{{ route('admin',auth()->id()) }}"
                                   onclick="event.preventDefault();document.getElementById('admin').submit();">
                                    Profil
                                </a>

                                <form id="admin" action="{{ route('admin',auth()->id()) }}" method="GET"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                                <a class="navbar-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                    </div>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    @show


    @section('header')
        <section class="hero is-medium is-primary is-bold">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">
                        @include('partials.page_title')
                    </h1>
                </div>
            </div>
        </section>
    @show

    <div class="container">
        @yield('content')
    </div>

    @section('footer')
        <footer class="footer">
            <div class="content has-text-centered">
                <p>
                    <strong>A Laravel Blog</strong> by <a href="">A BERTON</a>. The source code is licensed
                    <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                </p>
            </div>
        </footer>
    @show

</body>
</html>
