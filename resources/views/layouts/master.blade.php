<head>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<div id="background">
</div>

<div class="container">
    <header>
        @guest


                    <div class ="row">
                <div class="login">
            <a href="{{ route('login') }}">Einloggen</a>
                </div>
                <div class="register">

            <a href="{{ route('register') }}">Registrieren</a>
                </div>

                </div>

        @else
                <div class="login">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Abmelden
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                        <li><a href="{{action('UserController@profile',Auth::user()->id )}}">Profil </a></li>

                    </ul>
                </div>
                @endguest

         
        <div class="row">
            <a href="{{ route('home') }}">
            <h1>Förderbar in Kiel</h1>
            </a>
        </div>
        <div class="row">
            <nav>
                <ul>
                    @if ('activeproject'===Route::currentRouteName())
                        <li class="selected">
                        <a href="{{ route('activeproject') }}">
                            Projekte
                            <span>klein aber fein</span>
                        </a>
                    </li>
                    @else
                        <li >
                            <a href="{{ route('activeproject') }}">
                                Projekte
                                <span>klein aber fein</span>
                            </a>
                        </li>
                    @endif

                    @if ('sogehts'===Route::currentRouteName())
                            <li class="selected">
                        <a href="{{ route('sogehts') }}">
                            So geht's
                        <span>einreichen / unterstützen</span>
                        </a>
                    </li>
                        @else
                            <li>
                                <a href="{{ route('sogehts') }}">
                                    So geht's
                                    <span>einreichen / unterstützen</span>
                                </a>
                            </li>
                        @endif
                        @if ('idee'===Route::currentRouteName())
                    <li class="selected">
                        <a href="{{ route('idee') }}">
                        die Idee
                        <span>das steckt dahinter</span>
                        </a>
                    </li>
                      @else
                            <li>
                                <a href="{{ route('idee') }}">
                                    die Idee
                                    <span>das steckt dahinter</span>
                                </a>
                            </li>
                      @endif
                        @if ('projects.create'===Route::currentRouteName())
                        <li class="selected"><a href="{{route('projects.create') }}" >
                            neues projekt
                        <span>erstellen</span>
                        </a>
                    </li>
                            @else
                            <li><a href="{{route('projects.create') }}" >
                                    neues projekt
                                    <span>erstellen</span>
                                </a>
                            </li>
                            @endif
                </ul>
            </nav>
        </div>
    </header>




@yield('content')



<div class="row">
    <footer>
        <ul class="footer__leftnavi">

        </ul>
        <ul class="footer__rightnavi">
            <li>
                <a href="{{action('HomeController@impressum')}}">Impressum</a>
            </li>
            <li>
                <a href="{{action('HomeController@datenschutz')}}">Datenschutz</a>
            </li>
        </ul>


    </footer>
</div>
</div>



</body>
