<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $precio = $_POST["precio"];

    $stmt = $conexion->prepare("INSERT INTO productos (fullname, precio) VALUES (?, ?)");
    $stmt->bind_param("ss", $fullname, $precio);

    if ($stmt->execute()) {
        echo "<script>alert('Producto registrado exitosamente'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    <input type="text" name="fullname" placeholder="Nombre de Producto" required>
    <input type="number" name="precio" step="0.01" min="0" placeholder="Precio" required>

    <button type="submit">Agregar Producto</button>
</form>
