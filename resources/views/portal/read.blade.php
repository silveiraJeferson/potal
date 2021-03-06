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
                <div class="nav-wrapper #4db6ac teal lighten-2">
                    <a href="#!" class="brand-logo offset-s1"><i class="material-icons"  >wb_sunny</i>JLS</a>
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
                        <li><a href="sass.html">Sass</a></li>
                        <li><a href="badges.html">Components</a></li>
                        <li><a href="collapsible.html">Javascript</a></li>
                        <li><a href="mobile.html">Mobile</a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <main>
            <div class="row">

                <div class="col s12 m4 l3"> <!-- Note that "m4 l3" was added -->
                    <!-- Grey navigation panel-->

                    <div class="collection">
                        <a href="/milionarios" class="collection-item">Milionários</a>

                    </div>

                </div>

                <div class="col s12 m8 l9"> <!-- Note that "m8 l9" was added -->
                    
                    @yield('portal')

                </div>

            </div>
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
                    © 2014 Copyright Text
                    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
                </div>
            </div>
        </footer>




        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script src="{{ asset('js/main.js') }}" defer></script>

    </body>
</html>
