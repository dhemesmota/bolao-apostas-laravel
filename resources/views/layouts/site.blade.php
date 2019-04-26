<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css" rel="stylesheet') }}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    
</head>
<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{ route('principal') }}#page-top">FamilyBest</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="{{ route('principal') }}#boloes">{{ __('linguagem.betting_list') }}</a>
                </li>

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('linguagem.login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('linguagem.register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('linguagem.dashboard') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">
                                Perfil
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('linguagem.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link" id="lang" rule="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">{{ __('linguagem.translate') }}</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="lang">
                        <a class="dropdown-item" href="{{ route('lang') }}">{{ __('linguagem.lang') }}</a>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <main class="">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
            <div class="col-md-4">
                <span class="copyright">@lang('linguagem.copyright') &copy; FamilyBest @php echo date('Y');  @endphp</span>
            </div>
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                    <a href="#">
                    <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                    <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#">
                    <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="list-inline quicklinks">
                <li class="list-inline-item">
                    <a href="#">@lang('linguagem.privacy_policy')</a>
                </li>
                <li class="list-inline-item">
                    <a href="#">@lang('linguagem.terms_of_use')</a>
                </li>
                </ul>
            </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/agency.min.js') }}"></script>
</body>
</html>
