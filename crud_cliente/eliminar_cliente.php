<?php
include("conexion.php");

$id = $_GET["id"];
$conexion->query("DELETE FROM cliente WHERE id = $id");

echo "<script>alert('Usuario eliminado'); window.location='index.php';</script>";
?>
