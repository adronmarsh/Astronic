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
    <div
        class="menu translucid col-12 col-md-2 min-vh-100 d-flex text-center justify-content-center">
        {{-- <div class="h-100"> --}}
            <ul class="nav nav-pills flex-column mt-2 text-center d-flex flex-wrap">
                <li class="nav-item mb-3">
                    <a href="/account" class="nav-link"><img class="img-menu" src="/media/menu/profile.png"
                            alt="Profile"></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="/index" class="nav-link"><img class="img-menu" src="/media/menu/home.png"
                            alt="Home"></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="/chat" class="nav-link"><img class="img-menu" src="/media/menu/chat.png"
                            alt="Chat"></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/map.png"
                            alt="Map"></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="/posts/create" class="nav-link"><img class="img-menu" src="/media/menu/plus.png"
                            alt="Submit Posts"></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="/settings" class="nav-link"><img class="img-menu" src="/media/menu/settings.png"
                            alt="Settings"></a>
                </li>
                <li class="nav-item mb-3">
                    <a href="/logout" class="nav-link"><img class="img-menu" src="/media/menu/logout.png"
                            alt="Logout"></a>
                </li>
            </ul>
        {{-- </div> --}}
    </div>
    <div class="col-12 col-md-10">
        @yield('content')
    </div>
    <script src="{{ asset('js/like.js') }}"></script>

</body>

</html>
