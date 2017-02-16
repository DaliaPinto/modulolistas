<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Jerome') }}</title>

    <!-- Styles - Here can put all the styles references, this is the main page -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap-min/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome/css/font-awesome.min.css">
    <link href="/css/header/navbar.css" rel="stylesheet">
    @yield('head')

    <!-- Scripts - Here can put all the styles references, this is the main page -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <nav class=" navbar-style">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <i class="fa fa-bars fa-2x" aria="true" style="color:#fff;"></i>
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a href="{{ url('/') }}" data-toggle="tooltip" title="Ir a Inicio" data-placement="right">
                        <img src="/images/logo.png" alt="">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
                            <li><a href="{{ url('/register') }}">Registro</a></li>
                        @else
                            <li class="dropdown" data-toggle="tooltip" title="Menú de Usuario" data-placement="left">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user-o" aria="true"></i>
                                    @php
                                        $teacher = Auth::user()->teacher;
                                        echo 'Bienvenido '. $teacher->name. ' ' .$teacher->last_name. ' '.$teacher->middle_name;
                                    @endphp
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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
    </div>
    <!-- Scripts -->
    <script src="{{URL::to('/js/jquery-min/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery/jquery-1.10.2.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery-min/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/jquery-min/jquery-migrate-1.2.1.min.js')}}" type="text/javascript"></script>

    <!--Script for validation form-->
    <script src="{{URL::to('/js/jquery.validate.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/validation.js')}}" type="text/javascript"></script>
    <!--Script for date format-->
    <script src="{{URL::to('/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{URL::to('/js/locale.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            curDate();
        });
        //obtain a current day in div.
        function curDate(){
            var today = moment(new Date());
            $('#is-today').text('Hoy es: '+today.format('dddd, D MMMM YYYY, h:mm:ss a'));
        }
    </script>
    @yield('javascript')
</body>
</html>
