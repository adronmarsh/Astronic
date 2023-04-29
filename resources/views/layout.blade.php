<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adrián Martínez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Iconos Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Space+Mono&display=swap"
        rel="stylesheet">
    <!--Título-->
    <title> @yield('title') - Astronic</title>
    <!--Icono de la página-->
    <link rel="icon" href="/media/logo.ico">

</head>


<body class="background container row flex-nowrap">
            <div
                class="translucid col-12 col-md-2 min-vh-100 border-end border-dark d-flex align-items-center text-center justify-content-center">
                <div class="p-2 h-75">
                    <ul class="nav nav-pills flex-column mt-2 text-center">
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/profile.png"
                                    alt="Profile"></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/home.png"
                                    alt="Home"></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/chat.png"
                                    alt="Chat"></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/map.png"
                                    alt="Map"></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/plus.png"
                                    alt="Submit"></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="#" class="nav-link"><img class="img-menu" src="/media/menu/settings.png"
                                    alt="Settings"></a>
                        </li>
                        <li class="nav-item mb-3">
                            <a href="logout" class="nav-link"><img class="img-menu" src="/media/menu/logout.png"
                                    alt="Logout"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-10">
                <main>
                    @yield('content')
                </main>
            </div>
</body>

</html>
