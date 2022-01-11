<?php
require_once "conexion.php";

class ModeloTablas
{

    #Lectura de registros

    /*  Este Metodo  es utilizado para realizar distintos tipos de consulta dentro de las tablas de nuestra base de datos 
     *  A traves de el, y dependiendo de los valores que enviemos como atributos, es posible consultar:
     *      -Todos los registros de una tabla
     *      -Una fila en particulas de alguna tabla
     *      -Un registro especifico en la base de datos */
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

    # Obtencion del registro que mas se repite en una columna determinada

    /* Este Metodo es utilizado constantemente para encontrar que registro 
     * se repite mas en las distintas columnas de la tabla vuelo */

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

    #Obtencion de los registros repetidos de la tabla vuelos que en total sumen mas de dos registros

    /* Este metodo es uno de los dos metodos que ayudan a resolver el cuarto punto de la actividad SQL
     * El metodo selecciona aquellos elementos que se repitan mas de dos veces
     * ES utilizado para hallar el id de las aerolineas que se repitan una cantidad mayor a dos */
    static public function mdlObtenerRegistrosMayoresADos($item)
    {
        $stmt = Conexion::conectar()->prepare("SELECT $item FROM `vuelos` 
        GROUP BY $item
        HAVING COUNT(*)>2;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    #Obtencion de la cantidad de registros que compartan un mismo dia

    /* Este es el segundo metodo utilizado para encontrar las aerolineas que hayan realizado mas de dos vuelos en un mismo dia
     * El metodo devulve el dia y la cantidad de veces que se repite segun la lista de ids obtenidos con el metodo mdlObtenerRegistrosMAyoresADos()  */
    static public function mdlObtenerRegistrosPorDia($item)
    {
        $stmt = Conexion::conectar()->prepare("SELECT `dia`, COUNT(`dia`) AS total FROM `vuelos` WHERE `id_aerolinea` = $item
        GROUP BY `dia` ORDER BY total DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
