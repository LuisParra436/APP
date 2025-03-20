<?php
class Database {
    public static function connect() {
        $conexion = new mysqli("localhost", "root", "", "dorado");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        return $conexion;
    }
}
?>
