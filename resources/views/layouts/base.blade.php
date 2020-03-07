<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="csrf-token" content="{{ csrf_token() }}">       

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            #pastaArea{
                height: 400px;
            }

            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                right: 0;
                z-index: 100;
                padding: 48px 0 0;
                box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
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
                    <!--                    <form class="form-inline mt-2 mt-md-0 mr-0 ml-auto">
                                            <input class="form-control mr-sm-2" type="text" placeholder="Введите часть текста" aria-label="Search">
                                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
                                        </form>-->
                    
                    <ul class='navbar-nav'>
                        @auth
                        <li class='nav-item'>
                            <a class='nav-link' href='{{ action('SnippetController@userSnippets') }}'>Мои пасты</a>
                        </li>
                        @endauth
                    </ul>
                    
                    <ul class="navbar-nav mr-0 ml-auto">

                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container-fluid mt-5">
            <div class="row">
                <main role="main" class="col-md-9 mr-sm-auto col-lg-9 px-4 pt-4">

                    @if (session('status'))
                    <div class="alert alert-info">
                        {!! session('status') !!}
                    </div>
                    @endif

                    @if (session('message'))
                    <div class="alert alert-success">
                        {!! session('message') !!}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    @yield('content')
                </main>
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        @include('layouts.listing', ['listing' => $publicListing, 'listingTitle' => 'Последние публичные пасты', 'listingEmpty' => 'Создайте публичную пасту, и она появится здесь!' ])
                        @auth
                        @include('layouts.listing', ['listing' => $privateListing, 'listingTitle' => 'Ваши недавние пасты', 'listingEmpty' => 'Здесь будут ваши недавние пасты' ])
                        @endauth  
                    </div>
                </nav>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <span class="text-muted"><a href='mailto:artwork3d@gmail.com'>Яковлев Антон</a> &copy; 2020</span>
            </div>
        </footer>

        <script src="{{ asset('js/app.js') }}" ></script>
        @yield('js')
    </body>
</html>
