<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        @if (!Auth::guest())
            <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/listemagazine') }}">
                    Liste magazines
                </a>

                <a class="navbar-brand" href="{{ url('/creerpublication') }}">
                    | Créer publication
                </a>

                <a class="navbar-brand" href="{{ url('/gestionclient') }}">
                    | Gestion compte client
                </a>

                <a class="navbar-brand" href="{{ url('/historiqueclient') }}">
                    | Gestion historiques clients
                </a>

                <a class="navbar-brand" href="{{ url('/paiementenretard') }}">
                    | Paiement en retard
                </a>
            @endif
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                <!-- <li><a href="XXXXXXXXX route('register') XXXXXXXXX">S'enregistrer</a></li> -->
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Menu <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <center><b>~</b> Bonjour <b><i>{{ Auth::user()->name }} ~</i></b></center>
                            </li>
                            <li>
                                <a href="{{ url('/listemagazine') }}">
                                    <i>Liste magazines</i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/creerpublication') }}">
                                    <i>Créer publication</i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/gestionclient') }}">
                                    <i>Gestion client</i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/historiqueclient') }}">
                                    <i>Historique client</i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/paiementenretard') }}">
                                    <i>Paiement en retard</i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <b>Déconnexion</b>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<br><br><br>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <span class="copyright">Copyright &copy; Esimed - 2017</span>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>