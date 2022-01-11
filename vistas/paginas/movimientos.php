<?php
$tabla = "movimientos";
$movimientos = ControladorTablas::ctrlSeleccionarRegistro($tabla, null, null, null);
?>
<div class="container col-md-8 col-lg-6 mt-5">
    <h1 class="mb-4">Movimientos</h1>
    <p class="lead">La siguiente tabla muestra el contenido de la tabla <strong>Movimientos</strong>:</p>
    <table class="table table-striped text-center border">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripcion</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movimientos as $key => $value) : ?>
                <tr>
                    <td><?php echo ($value["id_movimiento"]) ?></td>
                    <td><?php echo ($value["descripcion"]) ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>