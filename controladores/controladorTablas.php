<?php
class ControladorTablas
{
    static public function ctrlSeleccionarRegistro($tabla, $item, $columna, $valor)
    {
        $respuesta = ModeloTablas::mdlSeleccionarRegistros($tabla, $item, $columna, $valor);
        return $respuesta;
    }

    static public function ctrlSeleccionarMasRepetido($tabla, $item)
    {
        $respuesta = ModeloTablas::mdlObtenerMasRepetido($tabla, $item);
        return $respuesta;
    }

    static public function ctrlObtenerRegistrosMayoresADos($item)
    {
        $alConRegistrosMayoresADos =  [];
        $ind = 0;
        $respuesta = ModeloTablas::mdlObtenerRegistrosMayoresADos($item); #Obtiene las aerolineas con mas de un registro
        foreach ($respuesta as $key1 => $value1) :
            $aerolinea = ModeloTablas::mdlObtenerRegistrosPorDia($value1["id_aerolinea"]);
            foreach ($aerolinea as $key2 => $value2) :
                if ($value2["total"] > 2) {
                    $alConRegistrosMayoresADos[$ind] = $value1["id_aerolinea"];
                    $ind++;
                }
            endforeach;
        endforeach;
        return $alConRegistrosMayoresADos;
    }
}
