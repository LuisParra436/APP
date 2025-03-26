<?php
include("../../config/conexion.php");

$id = $_GET["id"];
$conexion->query("DELETE FROM users WHERE id = $id");

echo "<script>alert('Usuario eliminado'); window.location='listar.php';</script>";
?>
