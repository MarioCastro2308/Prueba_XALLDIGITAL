<?php
session_start();  //Este sistema trabaja con variables de sesion
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP MYSQL CRUD</title>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!--Bootstrap 4 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #fred {
            background-color: #777;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php?pagina=inicio">PRUEBA XALLDIGITAL</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                    <ul class="navbar-nav ">
                        <?php if (isset($_GET["pagina"])) { ?>
                            <?php if ($_GET["pagina"] == "inicio") { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=inicio" class="active nav-link">Inicio</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=inicio" class="nav-link">Inicio</a>
                                </li>
                            <?php } ?>
                            <?php if ($_GET["pagina"] == "aerolineas") { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=aerolineas" class="active nav-link">Aerolineas</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=aerolineas" class="nav-link">Aerolineas</a>
                                </li>
                            <?php } ?>
                            <?php if ($_GET["pagina"] == "aeropuertos") { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=aeropuertos" class="active nav-link">Aeropuertos</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=aeropuertos" class="nav-link">Aeropuertos</a>
                                </li>
                            <?php } ?>
                            <?php if ($_GET["pagina"] == "movimientos") { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=movimientos" class="active nav-link">Movimientos</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=movimientos" class="nav-link">Movimientos</a>
                                </li>
                            <?php } ?>
                            <?php if ($_GET["pagina"] == "vuelos") { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=vuelos" class="active nav-link">Vuelos</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a href="index.php?pagina=vuelos" class="nav-link">Vuelos</a>
                                </li>
                            <?php } ?>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="index.php?pagina=inicio" class="active nav-link">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?pagina=aerolineas" class="nav-link">Aerolineas</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?pagina=aeropuertos" class="nav-link">Aeropuertos</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?pagina=movimientos" class="nav-link">Movimientos</a>
                            </li>
                            <li class="nav-item">
                                <a href="index.php?pagina=vuelos" class="nav-link">Vuelos</a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container-fluid px-0">
            <?php
            if (isset($_GET["pagina"])) {
                if ( // Lista blanca (Variables GET perimitidas por el sistema)
                    $_GET["pagina"] == "inicio" ||
                    $_GET["pagina"] == "aerolineas" ||
                    $_GET["pagina"] == "aeropuertos" ||
                    $_GET["pagina"] == "movimientos" ||
                    $_GET["pagina"] == "vuelos" ||
                    $_GET["pagina"] == "soluciones"
                ) {
                    include "paginas/" . $_GET["pagina"] . ".php";
                } else {
                    include "paginas/error404.php"; // Pagina por defecto al intentar introducir una variable GET no permitida
                }
            } else {
                include "paginas/inicio.php";
            }
            ?>
        </div>
    </main>
    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>