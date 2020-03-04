<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">-->

        <!-- Bootstrap core CSS -->
        <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <!--<link href="sticky-footer-navbar.css" rel="stylesheet">-->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            #pastaArea:focus{
                padding-top: 15px;
            }

            #pastaArea{
                transition: .3s;
                height: 500px;
            }

        </style>
    </head>

    <body>

        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <a class="navbar-brand" href="{{ url('/') }}">We all love Pastas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}">Главная <span class="sr-only">(текущая)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                    </ul>
                    <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Введите часть текста" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                    </form>
                </div>
            </nav>
        </header>

        <!-- Begin page content -->
        <main role="main" class="container">

            @if (session('message'))
                <div class="alert alert-success">
                    {!! session('message') !!}
                </div>
            @endif
            
            @yield('content')
            
            


            <!--<h1 class="mt-5">Sticky footer with fixed navbar</h1>-->
            <!--<p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body &gt; .container</code>.</p>-->
            <!--<p>Back to <a href="../sticky-footer/">the default sticky footer</a> minus the navbar.</p>-->
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted"><a href='mailto:artwork3d@gmail.com'>Яковлев Антон</a> &copy; 2020</span>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->   
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
        <!--<script src="../../assets/js/vendor/popper.min.js"></script>-->
        <!--<script src="../../dist/js/bootstrap.min.js"></script>-->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <script>

        </script>
    </body>
</html>
