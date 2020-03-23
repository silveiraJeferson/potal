<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link type="text/css" rel="stylesheet" href="{{ asset('css/main.css') }}" >

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <header>
            <nav>
                <div class="nav-wrapper green">
                    <a href="#!" class="brand-logo offset-s1"><i class="material-icons"  >monetization_on</i>Os Milionários</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"  >menu</i></a>

                    <ul class="right hide-on-med-and-down">
                        <!--                        <li><a href="sass.html">Sass</a></li>
                                                <li><a href="badges.html">Components</a></li>
                                                <li><a href="collapsible.html">Javascript</a></li>-->

                        @guest
                        <li class="">
                            <a class="" href="{{ route('login') }}"><i class="material-icons">person_outline</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar-se') }}</a>
                        </li>
                        @else

                        <a class='dropdown-button btn' href='#' data-activates='dropdown1'>{{ Auth::user()->name }}</a>

                        <!-- Dropdown Structure -->
                        <ul id='dropdown1' class='dropdown-content'>
                            <li>
                                <a class="dropdown-item" disabled> {{ Auth::user()->name }}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    <i class="material-icons">exit_to_app</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                        </ul>
                        @endguest
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a href="/" class="collection-item">JLS online</a></li>
                        <li><a href="/" class="collection-item">Conferir Resultados</a></li>
                        <li><a href="/jogos/create" class="collection-item">Cadastrar Jogos</a></li>
                        <li><a href="/" class="collection-item">Gerador de Numeros</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="row">

                <div class="col s12 m4 l3 hide-on-small-only"> <!-- Note that "m4 l3" was added -->
                    <!-- Grey navigation panel-->

                    <div class="collection">
                        <a href="/" class="collection-item">JLS online</a>
                        <a href="/" class="collection-item">Conferir Resultados</a>
                        <a href="/jogos/create" class="collection-item">Cadastrar Jogos</a>
                        <a href="/" class="collection-item">Gerador de Numeros</a>
                        <a href="/" class="collection-item"></a>

                    </div>

                </div>

                <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
                    <small>{{session()->get('data')}}</small>
                    <div class="row">
                        <div class="fixed-action-btn toolbar">
                            <a class="btn-floating btn-large orange">
                                <i class="large material-icons">dehaze</i>
                            </a>
                            <ul>
                                <li><a href="/organizacao" class="red" title="Organizações"><i class="material-icons">account_balance</i></a></li>
                                <li><a href="/apostador" class="yellow darken-1" title="Apostadores"><i class="material-icons">person_add</i></a></li>
                                <li><a href="/grupo" class="green" title="Grupos"><i class="material-icons">group</i></a></li>
                            </ul>
                        </div>
                       
                    </div>
                    @yield('milion')

                </div>

            </div>
            <!--            <div class="fixed-action-btn horizontal">
                            <a class="btn-floating btn-large #e65100 orange darken-4">
                                <i class="large material-icons">add</i>
                            </a>
                            <ul>
                                <li><a href="/organizacao" class="btn-floating red" title="Organizações"><i class="material-icons">account_balance</i></a></li>
                                <li><a href="/apostador" class="btn-floating yellow darken-1" title="Apostadores"><i class="material-icons">person_add</i></a></li>
                                <li><a href="/grupo" class="btn-floating green" title="Grupos"><i class="material-icons">group</i></a></li>
                                <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
                            </ul>
                        </div>-->
        </main>
        <footer class="page-footer #004d40 teal darken-4">

            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <h5 class="white-text">Footer Content</h5>
                        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
                    </div>
                    <div class="col l4 offset-l2 s12">
                        <h5 class="white-text">Links</h5>
                        <ul>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                            <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="container">
                    © 2020 Copyright Text

                </div>
            </div>
        </footer>




        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

        <script src="{{ asset('js/main.js') }}" defer></script>

    </body>
</html>
