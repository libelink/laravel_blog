@section('navbar')
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            @guest
                <a class="navbar-item" href="/">
                    <h1 class="is-size-3 has-text-weight-bold has-text-primary">BLOG</h1>
                </a>
            @else
                <a class="navbar-item" href="/home/admin/posts">
                    <h1 class="is-size-3 has-text-weight-bold has-text-primary">BLOG</h1>
                </a>
            @endguest

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                @guest
                    <a class="navbar-item" href="/">
                        Home
                    </a>
                @else
                    <a class="navbar-item" href="/home/admin/posts">
                        Home
                    </a>
                @endguest

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
