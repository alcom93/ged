<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle', 'default title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f4f9;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar {
            background-color: #4B2995;
            padding: 10px 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
        }

        .login-container {
            max-width: 400px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
        }

        .login-form {
            margin-top: 20px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4B2995;
            color: white;
        }

        .login-form button:hover {
            background-color: #37206F;
        }

        .footer {
            background-color: #4B2995;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brandmb-0 h19" href="{{ route('homepage') }}">NASSIF SOFTSass v1.0</a>
            <div class="d-flex align-items-center mx-auto">
                <a href="#" class="me-3 p-3"> Platform </a>
                <a href="#" class="me-3 p-3"> Solution</a>
                <a href="#" class="me-3 p-3"> Partner</a>
                <a href="#" class="me-3 p-3">Support</a>
            </div>
                <div class="d-flex align-items-center ">
                @guest
                    <a href="{{ route('login-page') }}" class="btn btn-outline-light">
                        <img src="{{ asset('img/téléchargement.jpeg') }}" alt="Sign In" style="width: 30px; height: 30px;margin-right: 5px"> Sign In</a>
                @endguest
                @auth
                <img src="{{ asset('img/téléchargement (1).jpeg') }}" alt="connecter" style="width: 30px; height: 30px;margin-right: 5px">  <span style="color: white">{{ Auth::user()->name }}</span>
                    
                    @if (Auth::user()->isAdmin())
                    <span style="color: white"> (admin)</span>
                    @endif -
                    <form class="mb-0" action="{{ route('logout-action') }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="btn btn-link text-info">
                            <img src="{{ asset('img/images (2).png') }}" alt="Logout" style="width: 30px; height: 30px;margin-right: 5px"> log out</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <div class="footer">
        © NASSIF SOFTSAS 2023
    </div>

</body>

</html>
