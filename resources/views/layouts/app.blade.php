<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NextStar') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--<script src="{{ asset('js/croppie.js') }}" defer></script>-->

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bevan&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
            
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">

            <a class="navbar-brand" href="{{ url('/') }}">
                <div><img src="{{URL::asset('/images/nextstar_logo.png')}}"/></div>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li><input type='text' class='form-control' name='searchArtist' placeholder="Search"></li>
                 </ul> 
                
                @guest

                @else
                <ul class="navbar-nav mr-auto icons">
                    <li><a href='/homeuser/{{Auth::user()->id}}'><img src="{{URL::asset('/images/home.png')}}"><div>HOME</div></a></li>
                    <li><a href='/hub/{{Auth::user()->id}}'><img src="{{URL::asset('/images/hub.png')}}"><div>HUB</div></li>
                    <li><a href='/playlist'><img src="{{URL::asset('/images/playlist.png')}}"><div>LIST</div></a></li>
                    <li><a href=''><img src="{{URL::asset('/images/charts.png')}}"/><div>CHART</div></a></li>
                    <li><a href='/notifications'><img src="{{URL::asset('/images/notification.png')}}"/><div>NEWS</div></a></li>
                </ul>

                <ul class="navbar-nav ml-auto icons">
                    <li><a href='/directory'><img src="{{URL::asset('/images/directory.png')}}"><div>DIRECTORY</div></a></li>
                    @if(Auth::user()->role==1)
                    <li><a href='/album/{{Auth::user()->id}}'><img src="{{URL::asset('/images/upload.png')}}"><div>UPLOAD</div></a></li>
                    @endif
                </ul>
                @endguest

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link home-nav-button" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link home-nav-button" href="{{ route('register') }}">{{ __('Register') }}</a>
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

<<<<<<< HEAD
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>

            </div>
=======
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href='/userprofile'
                                       onclick="event.preventDefault();
                                                     document.getElementById('userprofile-form').submit();">
                                        {{ __('Edit Profile') }}
                                    </a>
                                    <form id="userprofile-form" action="/userprofile" method="POST" style="display: none;">
                                        @csrf
                                    </form>
									
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
>>>>>>> 536b8cc91fefb56ce99e521287f3b35605e40029
            </div>
        </nav>

        
        <div class="container">
        <main class="py-4" id="content-wrap">
            @yield('content')
        </main> 
        </div>

    

    <footer>
        @include('inc.footer')
    </footer>

        
    </div>
</body>
</html>
