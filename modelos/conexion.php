<?php
class Conexion
{
    #A traves del siguiente metodo nos conectamos a la base de datos diseñada para almacenar cada una de las tablas de la prueba
    static public function conectar()
    {
        try {
            $dsn = "mysql:host=localhost:3307;dbname=prueba_xaldigital;charset=utf8";
            $pdo = new PDO($dsn, "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (Exception $e) {
            echo "Connection Faild: " . $e->getMessage();
        }
    }
}
