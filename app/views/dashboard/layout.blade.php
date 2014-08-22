
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-icon/icon_style.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- Mobile -->
    <link href="{{ asset('admin_user/style.css') }}" rel="stylesheet">

    <!-- Fancy Box-->
    <link href="{{ asset('fancybox/source/jquery.fancybox.css?v=2.1.5') }}" rel="stylesheet">

    <!-- Dropzone -->
    <link href="{{ asset('dropzone/css/dropzone.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="page-header-fixed bg-4">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">


    <div class="container-fluid top-bar">

        <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand pull-right" href="#">Project name</a>


    </div>
    <div class="container-fluid main-nav clearfix">
        <div class="nav-collapse">
            <ul class="nav">
                <li>
                    <a class="current" href="{{ route('dashboard') }}">
                        <span aria-hidden="true" class="fa fa-dashboard"></span>Panel de Control
                    </a>
                </li>
                <!--
                <li>
                    <a  href="#">
                        <span aria-hidden="true" class="fa fa-pencil"></span>Datos
                    </a>
                </li>-->
                <li>
                    <a  href="{{ route('gallery') }}">
                        <span aria-hidden="true" class="fa fa-camera"></span>Galeria
                    </a>
                </li>
                <li>
                    <a  href="#">
                        <span aria-hidden="true" class="fa fa-map-marker"></span>Ubicación
                    </a>
                </li>
                <li>
                    <a  href="{{ route('logout') }}">
                        <span aria-hidden="true" class="fa fa-power-off"></span>Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</div>

@yield('content')

<div class="container">
    <hr>

    <footer>
        <p>&copy; Company 2014</p>
    </footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('libs/1.11.1/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('fancybox/lib/jquery.mousewheel-3.0.6.pack.js') }}"></script>
<script src="{{ asset('fancybox/source/jquery.fancybox.js?v=2.1.5') }}"></script>
<script src="{{ asset('animate/js/jquery.appear.js') }}"></script>
<script src="{{ asset('animate/js/animate.js') }}"></script>
<script src="{{ asset('fancybox/master/ekko-lightbox.js') }}"></script>
<script src="{{ asset('dropzone/dropzone.min.js') }}"></script>
<script >
    $(document).ready(function() {

        $('.fancybox').fancybox();

        animate();

        /*
         * =============================================================================
         *   Mobile Nav
         * =============================================================================
         */
        $('.navbar-toggle').click(function() {
            return $('body, html').toggleClass("nav-open");
        });

    });

</script>
</body>
</html>
