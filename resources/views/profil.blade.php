<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet">
    <title>profile</title>
</head>
<body class="has-background-light">
@section('navbar')
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Accueil
                </a>

                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        A propos
                    </a>

                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            Présentation
                        </a>
                        <a class="navbar-item">
                            Portfolio
                        </a>
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            Télécharger mon CV
                        </a>
                    </div>
                </div>
                <a class="navbar-item">
                    Contact
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
                                <a class="navbar-item" href="{{ route('profil',auth()->id()) }}"
                                   onclick="event.preventDefault();document.getElementById('profil').submit();">
                                    Profil
                                </a>

                                <form id="profil" action="{{ route('profil',auth()->id()) }}" method="GET"
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

@section('content')
    <div class="container container-with-top-margin">
        <div class="columns">
            <div class="column is-3 has-fullheight">
                <div class="box has-background-white">
                    <aside class="menu">
                        <p class="menu-label">
                            Profil
                        </p>
                        <ul class="menu-list">
                            <li>
                                <a class="navbar-item" href="{{ route('editprofil',auth()->id()) }}"
                                   onclick="event.preventDefault();document.getElementById('editprofil').submit();">
                                    Voir mon profil
                                </a>

                                <form id="editprofil" action="{{ route('editprofil',auth()->id()) }}" method="GET"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                        <p class="menu-label">
                            Articles
                        </p>
                        <ul class="menu-list">
                            <li>
                                <a class="navbar-item" href="{{ route('userarticles',auth()->id()) }}"
                                   onclick="event.preventDefault();document.getElementById('userarticles').submit();">
                                    Mes articles
                                </a>

                                <form id="userarticles" action="{{ route('userarticles',auth()->id()) }}" method="GET"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li><a href="/home/post/create">Créer article</a></li>
                        </ul>
                        <p class="menu-label">
                            Commentaires
                        </p>
                        <ul class="menu-list">
                            <li>
                                <a class="navbar-item" href="{{ route('usercomments',auth()->id()) }}"
                                   onclick="event.preventDefault();document.getElementById('usercomments').submit();">
                                    Mes commentaires
                                </a>

                                <form id="usercomments" action="{{ route('usercomments',auth()->id()) }}" method="GET"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                            <li>
                                <a class="navbar-item" href="{{ route('userarticles_comments',auth()->id()) }}"
                                   onclick="event.preventDefault();document.getElementById('userarticles_comments').submit();">
                                    Commentaires de mes articles
                                </a>

                                <form id="userarticles_comments" action="{{ route('userarticles_comments',auth()->id()) }}" method="GET"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
            <div class="column as-background-white">
                <div class="box has-background-primary">
                    <div class="content is-large">
                        <div class="flex-center position-ref full-height">
                            <div class="content has-text-white">
                                <h1 class="has-text-white"> Hi, {{$user[0]->name}}</h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile is-ancestor">
                    <div class="tile is-4 is-vertical is-parent">
                        <div class="tile is-child box">
                            <p class="title">Personal infos</p>
                            <div class="content">
                                <div> name: {{$user[0]->name}}</div>
                                <p> email: {{$user[0]->email}}</p>
                            </div>
                        </div>
                        <div class="tile is-child box">
                            <p class="title">Stats</p>
                            <ul>
                                <li>Nombre d'articles: {{$articles->count()}}</li>
                                <li>Nombre de commentaire écrit: {{$commentsofuser->count()}}</li>
                                <li>Nombre de commentaires sur mes articles : {{$commentsbyuser->count()}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tile is-parent">
                        <div class="tile is-child box">
                            <p class="title">Last article : {{$articles->last()->title}}</p>
                            <p>{{$articles->last()->content}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@show

@section('footer')
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                <strong>Bulma</strong> by <a href="https://jgthms.com">Jeremy Thomas</a>. The source code is licensed
                <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
            </p>
        </div>
    </footer>
@show
</body>
</html>
