<?php
# Hallamos el registro mas repetido para cada una de las columnas de la tabla vuelos
$tabla = "vuelos";
$item = "id_aeropuerto";
$aeropuertoMasUsado = ControladorTablas::ctrlSeleccionarMasRepetido($tabla, $item);
$item = "id_aerolinea";
$aerolineaMasUsada = ControladorTablas::ctrlSeleccionarMasRepetido($tabla, $item);
$item = "dia";
$diaMasConcurrido = ControladorTablas::ctrlSeleccionarMasRepetido($tabla, $item);
# Hallamos el las aerolineas que hayan realizado mas de dos vuelo por dia
$aerolineasVuelosMasDos = ControladorTablas::ctrlObtenerRegistrosMayoresADos("id_aerolinea");
# Segun el id del registro obtenido en el paso anterior buscamos el nombre del registro al que pertenecen
$nombreAeropuerto = ControladorTablas::ctrlSeleccionarRegistro("aeropuertos", "nombre_aeropuerto", "id_aeropuerto", $aeropuertoMasUsado["id_aeropuerto"]);
$nombreAerolinea = ControladorTablas::ctrlSeleccionarRegistro("aerolineas", "nombre_aerolinea", "id_aerolinea", $aerolineaMasUsada["id_aerolinea"]);
#Rellenar Tabla
$vuelos = ControladorTablas::ctrlSeleccionarRegistro($tabla, null, null, null); #Almacena toda la tabla vuelos
?>
<div class="container p-5 px-md-3">
    <div class="row align-items-center">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 order-md-2 mx-auto p-md-4">
            <img src="Imagenes/myAnswer.png" srcset="Imagenes/myAnswer.svg" class="img-fluid" alt="Representacion de Conocimiento">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 order-md-1 text-center mt-sm-5">
            <h1 class="mb-3">Prueba SQL</h1>
            <p class="lead">
                A continuacion, se presentan de forma enumerada (junto a su respectiva respuesta) cada pregunta en la seccion SQL de la prueba que he realizado.
            </p>
        </div>
    </div>
</div>
<div class="container">
    <div class="container">
        <h2 class="mt-3">Tabla vuelos</h2>
        <p class="lead">
            A continuacion se presenta nuevamente la tabla vuelos. Sin embargo, en esta ocacion es presentada con los respectivos nombres para
            Aeropuertos y Aerolineas, asi como con la descripcion para cada movimiento.
        </p>
        <table class="table table-striped text-center border">
            <thead>
                <tr>
                    <th>Aerolinea</th>
                    <th>Aeropuerto</th>
                    <th>Movimientos</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vuelos as $key => $value) : ?>
                    <tr>
                        <td><?php
                            $tabla = "aerolineas";
                            $nombres = ControladorTablas::ctrlSeleccionarRegistro($tabla, "nombre_aerolinea", "id_aerolinea", $value["id_aerolinea"]);
                            echo ($nombres["nombre_aerolinea"])
                            ?>
                        </td>
                        <td>
                            <?php
                            $tabla = "aeropuertos";
                            $nombres = ControladorTablas::ctrlSeleccionarRegistro($tabla, "nombre_aeropuerto", "id_aeropuerto", $value["id_aeropuerto"]);
                            echo ($nombres["nombre_aeropuerto"])
                            ?>
                        </td>
                        <td>
                            <?php
                            $tabla = "movimientos";
                            $nombres = ControladorTablas::ctrlSeleccionarRegistro($tabla, "descripcion", "id_movimiento", $value["id_movimiento"]);
                            echo ($nombres["descripcion"])
                            ?>
                        </td>
                        <td><?php echo ($value["dia"]) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <div class="container my-5 p-3">
        <h2 class="mb-2">Respuestas a los ejercicios SQL</h2>
        <h3 class="mb-5">Las respuestas a los ejercicios SQL fueron</h3>
        <ol class="list-group list-group-numbered">
            <li class="list-group-item list-group-item-secondary">
                ¿Cuál es el nombre aeropuerto que ha tenido mayor movimiento durante el año?
                <p class="lead">El aeropuerto con mayor movimiento a lo largo del año ha sido: <?php echo ($nombreAeropuerto["nombre_aeropuerto"]); ?></p>
            </li>
            <li class="list-group-item">
                ¿Cuál es el nombre aerolínea que ha realizado mayor número de vuelos durante el año?
                <p class="lead">La aerolinea que ha realizado un mayor numero de vuelos ha sido: <?php echo ($nombreAerolinea["nombre_aerolinea"]); ?></p>
            </li>
            <li class="list-group-item list-group-item-secondary">
                ¿En qué día se han tenido mayor número de vuelos?
                <p class="lead">El dia con mayor numero de vuelos es: <?php echo ($diaMasConcurrido["dia"]); ?></p>
            </li>
            <li class="list-group-item">
                ¿Cuáles son las aerolíneas que tienen mas de 2 vuelos por día?
                <p class="lead">Las aerolineas con mas de dos vuelos por dia son:
                    <?php foreach ($aerolineasVuelosMasDos as $key => $value) : ?>
                        <span>
                            <?php
                            $nombreAerolinea = ControladorTablas::ctrlSeleccionarRegistro("aerolineas", "nombre_aerolinea", "id_aerolinea", $value[$key]);
                            print_r($nombreAerolinea["nombre_aerolinea"]);
                            ?>
                        </span>
                    <?php endforeach; ?>
                </p>
            </li>
        </ol>
    </div>
    <div class="container p-3 mb-5">
        <h2 class="mb-2">Explicacion a las soluciones</h2>
        <h3 class="mb-5">A continuacion se explica en detalle como se llego a cada uno de los resultados</h3>
        <ul class="list-group">
            <li class="list-group-item p-0">
                <div class="container-flui bg-dark text-white py-2">
                    <h3 class="text-center">PREGUNTA 1</h3>
                </div>
                <div class="container px-5 py-2">
                    <p>
                        Para resolver este primer ejercicio utitilice el siguiente Query para identificar, dentro de la tabla <strong>Vuelos</strong>, el id del aeropuerto
                        en el que mas veces se han realizado una mayor cantidad de vuelos o movimientos.
                    </p>
                    <p class="px-5">
                        <strong>Query utilizado:</strong> SELECT 'id_aeropuerto', COUNT('id_aeropuerto') AS total FROM 'vuelos'
                        GROUP BY 'id_aeropuerto' ORDER BY total DESC LIMIT 1
                    </p>
                    <p>
                        Posterior a ello debi relizar la consulta del nombre del aeropuerto en la tabla <strong>Aeropuertos</strong> a traves del <strong>ID</strong> del aeropuerto.
                    </p>
                    <p class="px-5">
                        <strong>Query utilizado:</strong> SELECT 'nombre_aeropuerto' FROM 'aeropuertos' WHERE 'id_aeropuerto' = $item
                    </p>
                </div>
            </li>
            <li class="list-group-item p-0">
                <div class="container-flui bg-dark text-white py-2">
                    <h3 class="text-center">PREGUNTA 2</h4>
                </div>
                <div class="container px-5 py-2">
                    <p>
                        Para resolver el segundo ejercicio utitilice el mismo proceso que en el caso anterior. Primero, utilice el siguiente Query para
                        obtener el id de la aerolinea que mas vuelos ha realizado a lo largo del año.
                    </p>
                    <p class="px-5">
                        <strong>Query utilizado: </strong> SELECT 'id_aerolinea', COUNT('id_aerolinea') AS total FROM 'vuelos'
                        GROUP BY 'id_aerolinea' ORDER BY total DESC LIMIT 1
                    </p>
                    <p>
                        Posterior a ello debi realizar la consulta del nombre de la Aerolinea en la tabla <strong>Aerolineas</strong> a traves del <strong>ID</strong> del aeropuerto.
                    </p>
                </div>
            </li>
            <li class="list-group-item p-0">
                <div class="container-flui bg-dark text-white py-2">
                    <h3 class="text-center">PREGUNTA 3</h3>
                </div>
                <div class="container px-5 py-2">
                    <p>
                        Para resolver este ejercicio utilice el siguiente Query para identificar, dentro de la tabla <strong>Vuelos</strong>, la fecha que mas se repetia.
                    </p>
                    <p class="px-5">
                        <strong>Query utilizado: </strong> <i>SELECT 'dia', DATE_FORMAT(dia,'%d/%m/%y') AS dia, COUNT('dia') AS total FROM 'vuelos'
                            GROUP BY 'dia' ORDER BY total DESC LIMIT 1</i>
                    </p>
                </div>
            </li>
            <li class="list-group-item p-0">
                <div class="container-flui bg-dark text-white py-2">
                    <h3 class="text-center">PREGUNTA 4</h3>
                </div>
                <div class="container px-5 py-2">
                    <p>
                        Para resolver el ultimo ejercicio debi utilizar los siguientes dos Querys. El primero identifica, dentro de la tabla <strong>Vuelos</strong>,
                        el id de las aerolineas que se repiten mas de dos veces.
                    </p>
                    <p class="px-5">
                        <strong>Query utilizado:</strong> <i>SELECT 'id_aerolinea' FROM `vuelos` GROUP BY 'id_aerolinea' HAVING COUNT(*)>2;</i>
                    </p>
                    <p>
                        En el segundo Query devuelve, segun el los id obtenidos en con ayuda del primer Query, la lista de los dias para cada aerolinea y
                        la cantidad de veces que se repiten.
                        En dado caso de que alguno de los dias se repita mas de 3 veces el controlador envia el id del respectivo elemento obtenido gracias a la ayuda del primer Query.
                    </p>
                    <p class="px-5">
                        <strong>Query utilizado:</strong><i>SELECT `dia`, COUNT(`dia`) AS total FROM `vuelos` WHERE `id_aerolinea` = $item
                            GROUP BY `dia` ORDER BY total DESC</i>
                    </p>
                    <p>
                        Posterior a ello debi relizar la consulta del nombre de la aerolinea en la tabla <strong>Aerolineas</strong> a traves del <strong>ID</strong>,
                        o la lista de <strong>IDs</strong> obtenidos.
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>