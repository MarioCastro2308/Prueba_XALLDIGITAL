<?php
$tabla = "aeropuertos";
$aeropuertos = ControladorTablas::ctrlSeleccionarRegistro($tabla, null, null, null);
?>
<div class="container col-md-8 col-lg-6 mt-5">
    <h1 class="mb-4">Aeropuertos</h1>
    <p class="lead">La siguiente tabla muestra el contenido de la tabla <strong>Aeropuertos</strong>:</p>
    <table class="table table-striped text-center border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aeropuerto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aeropuertos as $key => $value) : ?>
                <tr>
                    <td><?php echo ($value["id_aeropuerto"]) ?></td>
                    <td><?php echo ($value["nombre_aeropuerto"]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>