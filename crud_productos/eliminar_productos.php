<?php
include("conexion.php");

$id = $_GET["id"];
$conexion->query("DELETE FROM productos WHERE id = $id");

echo "<script>alert('Productos eliminados'); window.location='index.php';</script>";
?>
