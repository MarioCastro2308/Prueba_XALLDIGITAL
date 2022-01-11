<?php
require_once "conexion.php";

class ModeloTablas
{

    #Lectura de registros
    static public function mdlSeleccionarRegistros($tabla, $item, $columna, $valor)
    {
        if ($item == null && $columna == null && $valor == null) {
            if ($tabla == "vuelos") {
                $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(dia,'%d/%m/%y') AS dia FROM $tabla");
            } else {
                $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            }
            $stmt->execute();
            return $stmt->fetchAll();
        } else if ($item == null) {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna = :$columna");
            $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT $item FROM $tabla WHERE $columna = :$columna");
            $stmt->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        }
    }

    #Obtener el mas registro que mas se repita en una columna
    static public function mdlObtenerMasRepetido($tabla, $item)
    {
        if ($item == "dia") {
            $stmt = Conexion::conectar()->prepare("SELECT $item, DATE_FORMAT(dia,'%d/%m/%y') AS dia, COUNT($item) AS total FROM $tabla
            GROUP BY $item ORDER BY total DESC LIMIT 1");
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT $item, COUNT($item) AS total FROM $tabla
        GROUP BY $item ORDER BY total DESC LIMIT 1");
        }

        $stmt->execute();
        return $stmt->fetch();
    }

    #Obtiene los registros repetidos de la tabla vuelos que en total sumen mas de dos registros
    static public function mdlObtenerRegistrosMayoresADos($item)
    {
        $stmt = Conexion::conectar()->prepare("SELECT $item FROM `vuelos` 
        GROUP BY $item
        HAVING COUNT(*)>2;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    #Obtener, de los registros repetidos mas de dos veces, la cantidad de veces que se repite un cada dia en que se realizo un vuelo
    static public function mdlObtenerRegistrosPorDia($item)
    {
        $stmt = Conexion::conectar()->prepare("SELECT `dia`, COUNT(`dia`) AS total FROM `vuelos` WHERE `id_aerolinea` = $item
        GROUP BY `dia` ORDER BY total DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
