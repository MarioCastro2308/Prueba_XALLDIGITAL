<?php
$tabla = "aerolineas";
$aerolineas = ControladorTablas::ctrlSeleccionarRegistro($tabla, null, null, null);
?>
<div class="container col-md-8 col-lg-6 mt-5">
    <h1 class="mb-4">Aerolineas</h1>
    <p class="lead">La siguiente tabla muestra el contenido de la tabla <strong>Aerolineas</strong>:</p>
    <table class="table table-striped text-center border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Aerolinea</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($aerolineas as $key => $value) : ?>
                <tr>
                    <td><?php echo ($value["id_aerolinea"]) ?></td>
                    <td><?php echo ($value["nombre_aerolinea"]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>