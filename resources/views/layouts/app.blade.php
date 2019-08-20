<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="container">
        <nav>
            <a class="nav-link" href="{{ url('/') }}">Home</a> | 

                <!-- Authentication Links -->
                @guest
                    <a class="nav-link" href="{{ route('questions.index') }}">Questions</a> | 
                    <a class="nav-link" href="{{ route('login') }}">Login</a><br>  
                    <a href="{{ route('register') }}"><button>Register To Save Progress</button></a>
                @else
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        {{ __('Logout') }}
                    </a>
                @endguest
        </nav>

        @yield('content')
    </div>
</body>
</html>
