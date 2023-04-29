<!DOCTYPE html>
<html lang="es"
f>

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Adrián Martínez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CSS-->
    <link rel="stylesheet" href="/css/style.css">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--Iconos Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Mono+One&family=Space+Mono&display=swap" rel="stylesheet">
    <!--Título-->
    <title> @yield('title') - Astronic</title>
    <!--Icono de la página-->
    <link rel="icon" href="/media/logo.ico">

</head>

<body class="background">
    <div class="d-flex flex-column">
        <main class="d-flex justify-content-center align-items-center flex-column flex-grow-1">
            @yield('content')
        </main>
        <footer class="mt-auto py-3 footer col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 d-flex justify-content-center align-items-center footer">
            Astronic &#169;
        </footer>
    </div>
</body>
</html>
