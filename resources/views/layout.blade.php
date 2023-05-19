<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adrián Martínez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Iconos Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--Iconos Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--Título-->
    <title> @yield('title') - Astronic</title>
    <!--Icono de la página-->
    <link rel="icon" href="/media/logo.ico">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>


<body class="background row d-flex flex-row flex-wrap justify-content-center text-center m-0 p-0'"
    style="font-family: {{ session('fontFamily', 'Arial, sans-serif') }};">
    <div class="menu-top menu-color col-12 row-md-2 d-flex text-center justify-content-center">
        <ul
            class="nav nav-pills text-center d-flex flex-wrap justify-content-center flex-sm-row flex-md-row w-100  p-2">
            <div class="astronic-logo w-50 d-flex justify-content-start">
                <li class="nav-item d-flex align-items-center">
                    <a href="/">
                        <img class="img-logo" src="/media/logo.png" alt="{{ __('messages.alt_logo') }}">
                    </a>
                </li>
            </div>
            <div class="d-flex w-50 justify-content-end">
                @auth
                    @if (Auth::user()->rol == 'corporation')
                        <li class="nav-item">
                            <a href="/posts/create" class="nav-link"><img class="img-menu" src="/media/menu/plus.png"
                                    alt="Submit Posts"></a>
                        </li>
                    @endif
                @endauth
                <li class="nav-item">
                    <a href="/settings" class="nav-link"><img class="img-menu" src="/media/menu/settings.png"
                            alt="Settings"></a>
                </li>
                <li class="nav-item">
                    <a href="/account" class="nav-link"><img class="img-menu" src="/media/menu/profile.png"
                            alt="Profile"></a>
                </li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link"><img class="img-menu" src="/media/menu/logout.png"
                            alt="Logout"></a>
                </li>
            </div>
        </ul>
    </div>
    <div class="col-12 col-md-10 min-vh-100 my-5">
        @yield('content')
    </div>
    <div class="menu-bottom menu-color col-12 row-md-2 d-flex text-center justify-content-center">
        <ul
            class="nav nav-pills text-center d-flex flex-wrap justify-content-around flex-sm-row flex-md-row w-100  p-2">
            <li class="nav-item">
                <a href="/index" class="nav-link"><img class="img-menu" src="/media/menu/home.png" alt="Home"></a>
            </li>
            <li class="nav-item">
                <a href="/chat" class="nav-link"><img class="img-menu" src="/media/menu/chat.png" alt="Chat"></a>
            </li>

            <li class="nav-item">
                <a href="/users" class="nav-link"><img class="img-menu" src="/media/menu/map.png" alt="Map"></a>
            </li>

        </ul>
    </div>

    <script src="{{ asset('js/like.js') }}"></script>
    <script src="{{ asset('js/comment.js') }}"></script>
    <script src="{{ asset('js/chat.js') }}"></script>
</body>

</html>
