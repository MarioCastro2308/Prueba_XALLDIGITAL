<?php
require_once "controladores/controladorPlantilla.php";
require_once "controladores/controladorTablas.php";
require_once "modelos/modeloTablas.php";
$plantilla = new ControladorPlantilla(); //Instanciamos la clase
$plantilla->ctrlMostrarPlantilla(); //Llamamos al metodo