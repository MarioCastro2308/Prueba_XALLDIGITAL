<?php
class Conexion
{
    /* private $servername = "localhost:3307";
    private $username = "root";
    private $password = "";
    private $dbname = "prueba_xaldigital";
    private $charset = "utf8mb4"; */

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
