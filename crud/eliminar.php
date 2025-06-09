<?php
session_start();
include("../config/conexion.php");

// Validar que se recibió correctamente el ID por GET
if (!isset($_GET["eliminar"]) || !is_numeric($_GET["eliminar"])) {
    die("⚠️ Error: ID no válido o no recibido.");
}

$id = intval($_GET["eliminar"]); // Sanitiza el ID por seguridad

// Preparar y ejecutar la eliminación
$stmt = $conexion->prepare("DELETE FROM users WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('✅ Usuario eliminado correctamente'); window.location='../secciones/admin/usuarios.php';</script>";
} else {
    echo "❌ Error al eliminar: " . $stmt->error;
}
?>
