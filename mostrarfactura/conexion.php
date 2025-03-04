<?php
$conexion = new mysqli("localhost", "root", "" ,"dorado");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>