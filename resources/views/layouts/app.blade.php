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

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
    <div class="container">
        <nav class="align-center">
            <a class="nav-link" href="{{ url('/') }}">Home</a> | 

                <!-- Authentication Links -->
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a> |  
                    <mark><a href="{{ route('register') }}">FREE! Register To Save Progress</a></mark>  
                @else
                    <a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>  
                    @endguest

            <form class="inline-block align-center pl-2" method="POST" action="{{ route('home') }}">
                @csrf
                <input id="search" type="text" name="password">
                <button type="submit"/>Search</button>
            </form>
        </nav>

        @yield('content')
    </div>
</body>
</html>
