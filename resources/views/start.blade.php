<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Sticky Footer Navbar Template for Bootstrap</title>

        <!--<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sticky-footer-navbar/">-->

        <!-- Bootstrap core CSS -->
        <!--<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <!--<link href="sticky-footer-navbar.css" rel="stylesheet">-->
        <link rel="stylesheet" href="css/app.css">
        <style>
            #pastaArea:focus{
                padding-top: 50px;
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
                <a class="navbar-brand" href="#">We all love Pastas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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

            <form method="post">
                <div class="form-group form-inline">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Название &laquo;пасты&raquo;" />

                    <div class="dropdown">
                        <div class="btn-group">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Время жизни
                            </button>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">10 мин.</a>
                                <a class="dropdown-item" href="#">1 час</a>
                                <a class="dropdown-item" href="#">3 часа</a>
                                <a class="dropdown-item" href="#">1 день</a>
                                <a class="dropdown-item" href="#">1 неделя</a>
                                <a class="dropdown-item" href="#">1 месяц</a>
                                <a class="dropdown-item" href="#">Не ограничено</a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Доступ
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Публичный</a>
                                <a class="dropdown-item" href="#">Только по ссылке</a>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="button">Сохранить &laquo;пасту&raquo;</button>
                    </div>
                </div>

                <textarea class="form-control" id="pastaArea" rows="3"></textarea>
            </form>


            <h1 class="mt-5">Sticky footer with fixed navbar</h1>
            <p class="lead">Pin a fixed-height footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code>padding-top: 60px;</code> on the <code>body &gt; .container</code>.</p>
            <p>Back to <a href="../sticky-footer/">the default sticky footer</a> minus the navbar.</p>
        </main>

        <footer class="footer">
            <div class="container">
                <span class="text-muted">Place sticky footer content here.</span>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->   
        <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
        <!--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>-->
        <!--<script src="../../assets/js/vendor/popper.min.js"></script>-->
        <!--<script src="../../dist/js/bootstrap.min.js"></script>-->
        <script src="js/app.js" charset="utf-8"></script>
        <script>

        </script>
    </body>
</html>
