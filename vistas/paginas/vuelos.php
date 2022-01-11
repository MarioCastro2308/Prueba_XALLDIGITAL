<?php
$tabla = "vuelos";
$vuelos = ControladorTablas::ctrlSeleccionarRegistro($tabla, null, null, null); #Almacena toda la tabla vuelos


?>
<div class="container col-md-8 col-lg-6 mt-5">
    <h1 class="mb-3">Tabla vuelos</h1>
    <p class="lead">La siguiente tabla muestra el contenido de la tabla <strong>Vuelos</strong>:</p>
    <table class="table table-striped text-center border">
        <thead>
            <tr>
                <th>ID Aerolinea</th>
                <th>ID Aeropuerto</th>
                <th>ID Movimiento</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vuelos as $key => $value) : ?>
                <tr>
                    <td><?php echo ($value["id_aerolinea"]) ?></td>
                    <td><?php echo ($value["id_aeropuerto"]) ?></td>
                    <td><?php echo ($value["id_movimiento"]) ?></td>
                    <td><?php echo ($value["dia"]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>