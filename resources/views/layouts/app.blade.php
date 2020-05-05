<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NUEVOCASAS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link href="{{ URL::asset('css/estilos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/estilos.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/funciones.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/bootstrap.bundle.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                    {{ Auth::user()->name }} <span class="caret">

<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M44.8662 25.1291C44.8662 34.407 36.0278 41.9282 25.1251 41.9282C14.2223 41.9282 5.38391 34.407 5.38391 25.1291C5.38391 15.8513 14.2223 8.3301 25.1251 8.3301C36.0278 8.3301 44.8662 15.8513 44.8662 25.1291ZM15.9736 25.1291C15.9736 29.4301 20.0709 32.9167 25.1251 32.9167C30.1793 32.9167 34.2765 29.4301 34.2765 25.1291C34.2765 20.8282 30.1793 17.3416 25.1251 17.3416C20.0709 17.3416 15.9736 20.8282 15.9736 25.1291Z" fill="#1C1717"/>
<path d="M33.4879 42.6894C33.8419 40.4683 33.2602 37.699 34.2101 36.5901L15.6109 36.9372C17.5761 37.2561 16.7531 39.7058 16.9883 42.1235C17.4053 46.4116 32.8901 46.4403 33.4879 42.6894Z" fill="#1C1717"/>
<path d="M16.9141 7.24567C16.5328 9.46346 17.0804 12.2378 16.1169 13.3382L34.7193 13.157C32.7582 12.8205 33.6113 10.3783 33.4059 7.95863C33.0417 3.66704 17.5581 3.50031 16.9141 7.24567Z" fill="#1C1717"/>
<path d="M2.10668 20.8377C3.90953 22.4718 6.80244 23.8334 7.21513 25.1599L18.6242 12.6555C17.0943 13.7524 15.3786 11.6645 13.0249 10.2956C8.85045 7.86767 -0.937954 18.0781 2.10668 20.8377Z" fill="#1C1717"/>
<path d="M38.9483 10.352C36.5078 11.195 33.9735 13.0015 32.3706 12.8515L41.9722 26.4111C41.3203 24.8016 44.2271 24.1912 46.5753 22.8154C50.74 20.3754 43.0699 8.9284 38.9483 10.352Z" fill="#1C1717"/>
<path d="M47.4849 29.2114C45.6137 27.634 42.6647 26.3624 42.1958 25.0494L31.3265 37.8973C32.8086 36.7539 34.6121 38.7876 37.0225 40.0831C41.2975 42.3807 50.645 31.8754 47.4849 29.2114Z" fill="#1C1717"/>
<path d="M13.6757 40.4842C15.7377 39.0895 17.5701 36.748 19.1576 36.507L5.45037 25.8036C6.6094 27.1912 4.02306 28.4747 2.22644 30.3583C-0.960066 33.6991 10.1936 42.8395 13.6757 40.4842Z" fill="#1C1717"/>
</svg>
</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-lg-right" style="width:250px; height: 150px">

                                    <div>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <svg id="salir" class="im_svgs" width="50" height="28" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="1.5" y="1.5" width="14" height="25" rx="2.5" stroke="black" stroke-width="3"/>
                                        <path d="M27.6254 13.187C28.332 13.5676 28.3227 14.5847 27.6092 14.9549L19.2894 19.2727C18.6201 19.6201 17.8231 19.1314 17.8301 18.3781L17.9106 9.62178C17.9176 8.86844 18.7235 8.39149 19.3862 8.7485L27.6254 13.187Z" fill="black"/>
                                        <rect x="18.7333" y="16.0132" width="14.7314" height="3.95615" rx="1.97808" transform="rotate(-179.978 18.7333 16.0132)" fill="black"/>
                                        <rect x="14" y="9" width="3" height="3" fill="white"/>
                                        <rect x="14" y="16" width="3" height="3" fill="white"/>
                                    </svg>


                                        {{ __('Logout') }}
                                    </a>
                                    </div>
<div>

                                 <a class="" href="{{route('propiedades.index')}}">
                                    <svg class="im_svgs" width="50" height="29" viewBox="0 0 28 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="4" y="13" width="20" height="16" rx="1" fill="#010101"/>
                                        <g filter="url(#filter0_d)">
                                            <path d="M13.8204 0.786036C14.228 0.363591 14.9101 0.38148 15.295 0.82471L23.5621 10.3443C24.1243 10.9917 23.6645 12 22.8071 12H5.35452C4.4722 12 4.02224 10.9406 4.6349 10.3056L13.8204 0.786036Z" fill="black"/>
                                        </g>
                                        <rect x="11" y="18" width="6" height="11" fill="white"/>
                                        <defs>
                                            <filter id="filter0_d" x="0.352539" y="0.480398" width="27.4565" height="19.5196" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                <feOffset dy="4"/>
                                                <feGaussianBlur stdDeviation="2"/>
                                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                            </filter>
                                        </defs>
                                    </svg>

                                     <span class="txt_enlaces">Propiedades</span></a>
</div>
                                    @if(Auth::user()->hasRole('admin'))
                                        <div>
                                            <a href="{{route('usuarios.index')}}">

                                                <svg class="im_svgs"  width="50" height="30" viewBox="0 0 19 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="9.5" cy="6.5" r="6.5" fill="#010101"/>
                                                    <rect y="14" width="19" height="16" rx="5" fill="#010101"/>
                                                </svg>

                                                Usuarios</a>
                                        </div>
                                    @endif
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>


        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
